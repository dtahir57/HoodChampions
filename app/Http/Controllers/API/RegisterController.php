<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\UserRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Validator;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [ 
            'email' => 'required|max:255|unique:users',
            'name' => 'required|max:255',
            'username' => 'required|max:255|unique:users',
            'hood_id' => 'required',
            'phone_number' => 'required|max:255|unique:users',
            'gender' => 'required|boolean',
            'date_of_birth' => 'required'
        ]);
        if ($validator->fails()) { 
            return response()->json(['error'=>$validator->errors()], 401);            
        } else {
    		$input = $request->all();
            $username = env('BULKSMS_USERNAME');
            $password = env('BULKSMS_PASSWORD');
            // create the user
            $user = User::create($input);
            // Cache the otp 
            $otp = $this->cacheTheOtp($user->id);
            // Type a message
            $message = array('to' => $input['phone_number'], 'body' => 'Your HoodChampions code is '.$otp.'. This code will expire in 3 minutes.');
            $result = $this->send_message( json_encode($message), 'https://api.bulksms.com/v1/messages', $username, $password );

            if ($result['http_status'] != 201) {
              return response()->json(['error' => "Error sending: " . ($result['error'] ? $result['error'] : "HTTP status ".$result['http_status']."; Response was " .$result['server_response'])]);
            } else {
              return response()->json([
                'result' => "Response " . $result['server_response'],
                'user' => $user,
                'code' => 200
                // 'success'=>$success
            ]);
              // Use json_decode($result['server_response']) to work with the response further
            }
        }
    }

    public function getUser($id)
    {
        $user = User::find($id);
        // $otp = Cache::get('otp_'.$user->id);
        return response()->json([
            'user' => $user
            // 'otp' => $otp
        ]);
    }

    public function send_message ( $post_body, $url, $username, $password) {
      $ch = curl_init( );
      $headers = array(
      'Content-Type:application/json',
      'Authorization:Basic '. base64_encode("$username:$password")
      );
      curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
      curl_setopt ( $ch, CURLOPT_URL, $url );
      curl_setopt ( $ch, CURLOPT_POST, 1 );
      curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
      curl_setopt ( $ch, CURLOPT_POSTFIELDS, $post_body );
      // Allow cUrl functions 20 seconds to execute
      curl_setopt ( $ch, CURLOPT_TIMEOUT, 20 );
      // Wait 10 seconds while trying to connect
      curl_setopt ( $ch, CURLOPT_CONNECTTIMEOUT, 10 );
      $output = array();
      $output['server_response'] = curl_exec( $ch );
      $curl_info = curl_getinfo( $ch );
      $output['http_status'] = $curl_info[ 'http_code' ];
      $output['error'] = curl_error($ch);
      curl_close( $ch );
      return $output;
    }

    public function login(Request $request)
    {
        $user = User::where('phone_number', $request->phone_number)->first();
        if ($user) {
              $username = env('BULKSMS_USERNAME');
              $password = env('BULKSMS_PASSWORD');
              $otp = $this->cacheTheOtp($user->id);
              $message = array('to' => $user->phone_number, 'body' => 'Your HoodChampions code is '.$otp.'. This code will expire in 3 minutes.');
              $result = $this->send_message( json_encode($message), 'https://api.bulksms.com/v1/messages', $username, $password );

            if ($result['http_status'] != 201) {
              return response()->json(['error' => "Error sending: " . ($result['error'] ? $result['error'] : "HTTP status ".$result['http_status']."; Response was " .$result['server_response'])]);
            } else {
              return response()->json([
                'result' => "Response " . $result['server_response'],
                'user' => $user,
                'code' => 200,
            ]);
              // Use json_decode($result['server_response']) to work with the response further
            }
        }
        return response()->json([
            'code' => 400,
            'message' => 'User Not Found! Please type correct Phone Number'
        ]);
    }

    public function cacheTheOtp($userId)
    {
        $otp = rand(100000, 999999);
        Cache::put(['otp_'.$userId => $otp], now()->addMinutes(5));
        return $otp;
    }

    public function verify(Request $request)
    {
        $user = User::find($request->id);
        if (Cache::get('otp_'.$user->id) == $request->otp) {
            $success['token'] =  $user->createToken('HoodChampions')-> accessToken; 
            $success['name'] =  $user->name;
            $user->api_token = $success['token'];
            $user->update();
            Cache::forget('otp_'.$request->id);
            return response()->json([
                'code' => 200,
                'success' => $success
            ]);
        } else if(Cache::get('otp_'.$user->id) !== $request->otp) {
          return response()->json([
            'code' => 400,
            'message' => 'Code Mismatch! Please try again'
          ]);
        }
        else {
            return response()->json([
                'code' => 401,
                'message' => 'Code has been expired! Please resend the code'
            ]);
        }
    }
}

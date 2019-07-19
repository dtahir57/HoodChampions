<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ResendController extends Controller
{
    public function resend($id)
    {
        $username = env('BULKSMS_USERNAME');
        $password = env('BULKSMS_PASSWORD');
        $user = User::find($id);
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
          'message' => 'Code Sent Again'
    	]);
    	  // Use json_decode($result['server_response']) to work with the response further
    	}
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

    public function cacheTheOtp($userId)
    {
        $otp = rand(100000, 999999);
        Cache::put(['otp_'.$userId => $otp], now()->addMinutes(5));
        return $otp;
    }
}

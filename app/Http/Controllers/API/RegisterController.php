<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function register(Request $request)
    { 
        $validator = Validator::make($request->all(), [ 
            'name' => 'required',
            'phone_number' => 'required|unique:users',
            'email' => 'required|email', 
            'password' => 'required', 
            'c_password' => 'required|same:password', 
        ]);
		if ($validator->fails()) { 
            return response()->json(['error'=>$validator->errors()], 401);            
        }
		$input = $request->all(); 
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] =  $user->createToken('MyApp')-> accessToken; 
        $success['name'] =  $user->name;
        $loggedInUser = User::find($user->id);
        $loggedInUser->api_token = $success['token'];
        $loggedInUser->update();
		return response()->json(['success'=>$success], $this-> successStatus); 
    }
}

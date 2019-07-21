<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function SocialSignup($provider)
    {
        $user = Socialite::driver($provider)->stateless()->user();
        return response()->json($user);
    }
}

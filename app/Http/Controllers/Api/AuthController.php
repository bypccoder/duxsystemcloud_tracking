<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function login(Request $request){
        $credentials = $request->only('email', 'password');

        if(Auth::guard('api')->attempt($credentials)){
            $user = Auth::guard('api')->user();
            $jwt = JWTAuth::attempt($credentials);
            $success = true;
            $data = compact('user','jwt');
            return compact('success', 'data');
        }else{
            $success = false;
            $message = 'Credenciales Incorrectas';
            return compact('success', 'message');
        }
    }

    public function logout(){
        Auth::guard('api')->logout();
        $success = true;
        return compact('success');
    }
}

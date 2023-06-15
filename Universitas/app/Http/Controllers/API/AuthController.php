<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends BaseController
{
    public function login( Request $request)
    {
        if(Auth::attempt([
                'email' => $request->email, 
                'password' =>  $request->password,
            ])){
                $user = Auth::user();
                $result['token'] = $user->createToken('MdpApp', ['fakultas:create'])->plainTextToken;
                $result['name'] = $user->name;

                return $this->sendSuccess($result, 'Login Berhasil');
            }else{
                  return $this->sendError('Login Gagal');
            }
    }
}

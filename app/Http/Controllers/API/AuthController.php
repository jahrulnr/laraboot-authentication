<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    function login(Request $request) : JsonResponse{
        $validator = Validator::make($request->all(), [
            'email' => "required|email",
            'password' => "required|min:6"
        ]);

        if($validator->fails()){
            return back()->withErrors($validator);
        }

        $credentials = $request->only(['email', 'password']);
        if(Auth::attempt($credentials, $request->remember)){
            $user = Auth::user();
            $roles = $user->roles->pluck('name');
            unset($user->roles);
            $user->roles = $roles;
            $accessToken = $user->createToken('authToken')->plainTextToken;

            return response()->json([
                'user' => $user,
                'access_token' => $accessToken,
            ], 200);
        };

        return response()->json([
            'message' => 'Email/Password incorect'
        ], 401);
    }
}

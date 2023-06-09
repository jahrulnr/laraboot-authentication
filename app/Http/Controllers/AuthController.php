<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    function index(){
        return view("login");
    }

    function login(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => "required|email",
            'password' => "required|min:6"
        ]);

        if($validator->fails()){
            return back()->withErrors($validator);
        }

        $credentials = $request->only(['email', 'password']);
        if(Auth::attempt($credentials, $request->remember)){
            return redirect(route('home'));
        };

        return back()->with('errors', "Email/password not found");
    }
}

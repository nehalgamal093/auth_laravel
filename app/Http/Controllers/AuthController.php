<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class AuthController extends Controller

{
    public function register(Request $request){
       return User::create([
          'name' =>$request-> input('name'),
          'email'=> $request->input('email'),
          'password'=> Hash::make($request->input('password'))
        ]);
       
    }
    public function login(Request $request){
       if( !Auth::attempt($request->only('email','password'))){
           return response([
           'message' => 'Invalid credentials'
           ],);
       }
           $user = Auth::user();
           return $user;
        }
    public function user(){
        return Auth::user();
    }
}

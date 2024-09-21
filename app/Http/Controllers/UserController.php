<?php

namespace App\Http\Controllers;

use App\Helper\JWTToken;
use App\Models\User;
use Illuminate\Http\Request;
use PHPUnit\Exception;

class UserController extends Controller
{
    function userDashboard()
    {
        return view('pages.Dashboard.dashboard');
    }
    function  registrationPage()
    {
        return view('pages.auth.registration');
    }
    function  loginPage()
    {
        return view('pages.auth.login');
    }
    function registrationFormPost(Request $request)
    {
//        dd($request->all());
        try {
            User::create([
                'name'=> $request->input('name'),
                'email'=> $request->input('email'),
                'password'=> $request->input('password'),
                'role'=> $request->input('role')
            ]);
            return response()->json([
                'status'=> 'success',
                'message'=> 'Registration Successful!'
            ],200);
        } catch (Exception $e) {
            return response()->json([
                'status'=> 'fail',
                'message'=> 'Registration Failed!'
            ],200);
        }


    }

    function UserLogin(Request $request){
       $count = User::where('email','=',$request->input('email'))
        ->where('password','=',$request->input('password'))
        ->select('id')->first();                              // first method ব্যাবহার করলে একটি row select হয়
       if($count!==null){
            // User Login->JWT Token
           $token=JWTToken::createToken($request->input('email'),$count->id);
           return response()->json([
               'status'=> 'success',
               'message'=> 'Your are successfully logged in'
           ],200)->cookie('token',$token,60*24*30);
       } else{
           return response()->json([
               'status'=> 'fail',
               'message'=> 'unauthorized'
           ],200);
       }

    }

    function userLogout(){
        return redirect('/user-login')->cookie('token','',-1);
    }

}

















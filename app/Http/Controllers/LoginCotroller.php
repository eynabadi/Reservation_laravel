<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginCotroller extends Controller
{
    public function login()
    {
        return view('login.login');
    }

    public function loginpost(Request $request)
    {
        $user=new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=Hash::make($request->password);
        $user->save();
    }

    public function logincheck()
    {
        return view('logincheck.logincheck');
    }

    public function logincheckpost(Request $request)
    {
        $request->validate([
            'email'=>'required',
            'password'=>'required',
        ]);
        $chcklogin=[
            'email'=>$request->email,
            'password'=>$request->password,
        ];
        if(Auth::attempt($chcklogin)){
            return redirect('paneluser');
        }else{
            return  back();
        }
    }
}

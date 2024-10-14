<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use LdapRecord\Connection;
use Illuminate\Support\Facades\Cookie;


class Login extends Controller
{

    public function Login(Request $request){
        if($request->input('code')){
            Cookie::queue('CID', strval($request->username), 60);
            session(['USR' => $request->username]);
            return view('Logado.index');
        }
        return view('Login.Login_Forms');

    }
}

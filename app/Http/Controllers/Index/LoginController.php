<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(){
        if(request()->isMethod("get")){
            return view("hfive.login");
        }

    }
    public function register(){
        if(request()->isMethod("get")){
            return view("hfive.register");
        }

    }
}

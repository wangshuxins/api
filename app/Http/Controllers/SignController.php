<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SignController extends Controller
{
    public function sign(){
        $data = "I LOVE YOU";
        $key = "1911php";
        $sign_str = md5($data . $key);
        $url = "http://www.blog.com/sign?data=".$data."&sign=".$sign_str;
        $response = file_get_contents($url);
        echo $response;
    }
    public function sign1(){
        $data = "HELLOW";
        $content = openssl_get_privatekey(file_get_contents(storage_path("keys/priv.key")));
        $priv_key = openssl_get_privatekey($content);
        openssl_sign($data,$signature,$priv_key,OPENSSL_ALGO_SHA1);
        $sign = base64_encode($signature);
        $url = "http://www.blog.com/sign1?sign=".urlencode($sign)."&data=".urlencode($data);
        $res = file_get_contents($url);
        echo $res;

    }
}

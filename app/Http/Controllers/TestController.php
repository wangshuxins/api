<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function test(){
        $appid = "wx3d6c4ee4ee8c6159";
        $secret = "07a2621b89e3d7aad365687deba1118e";
        $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".$appid."&secret=".$secret;
        $content = file_get_contents($url);
        echo $content;
    }
    public function test1(){
        $appid = "wx3d6c4ee4ee8c6159";
        $secret = "07a2621b89e3d7aad365687deba1118e";
        $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".$appid."&secret=".$secret;
        
    }
}

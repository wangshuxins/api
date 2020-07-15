<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

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
        // 创建一个新cURL资源
        $ch = curl_init();

        // 设置URL和相应的选项
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
       curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);      // 将返回结果通过变量接收
        // 抓取URL并把它传递给浏览器
        $content = curl_exec($ch);

        echo $content;

        // 关闭URL资源，并且释放系统资源
        curl_close($ch);
    }
    public function test2(){
        $appid = "wx3d6c4ee4ee8c6159";
        $secret = "07a2621b89e3d7aad365687deba1118e";
        $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".$appid."&secret=".$secret;
        $client = new Client();
        $respose = $client->request("GET",$url);
        $data = $respose->getBody();
        echo $data;
    }
}

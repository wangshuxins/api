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
    public function test4(){

       $url = "http://www.blog.com/info";
        $ponseon = file_get_contents($url);
        var_dump($ponseon);
    }
    public function test5(Request $request){

        $username = $request->post("username");
        $password = $request->post("password");
       echo $username;

    }
    public function test3(){
        echo '<pre>';print_r($_POST);echo '</pre>';
    }

    public function decrypt(){

//        echo '<pre>';print_r($_POST);echo '</pre>';
        $method = "AES-256-CBC";
        $key = "usr";
        $iv = "aaaabbbbccccdddd";
        $enc_data = $_POST["data"];
        $d64_str = base64_decode($enc_data);
        $dec_data = openssl_decrypt($d64_str,$method,$key,OPENSSL_RAW_DATA,$iv);
        echo "解密:".$dec_data."<br>"."<hr>";
    }
    public function dersa(){
        $enc_data = $_POST["data"];
        $blog_pub_key = file_get_contents(storage_path("keys/blog_pub.key"));
        openssl_public_decrypt($enc_data,$dec_data,$blog_pub_key);
        ######################################################################
        $data = "已收到";
        $content = openssl_get_privatekey(file_get_contents(storage_path("keys/priv.key")));
        $priv_key = openssl_get_privatekey($content);
        openssl_private_encrypt($data,$enc_data,$priv_key);
        echo $enc_data;
    }
}

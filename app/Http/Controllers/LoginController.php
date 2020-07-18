<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Login AS LoginModel;
use App\Token AS TokenModel;
class LoginController extends Controller
{
    public function login(Request $request)
    {
        $name = $request->post("name");
        $pass = $request->post("pass");
        $u = LoginModel::where(["username"=>$name])->first();

        if($u){
            //验证密码
            if(password_verify($pass,$u->password)){
                //生成token
                $token = Str::random(32);
                $expirer_seconds = 7200;
                $data = [
                    "token"=>$token,
                    "uid" => $u->id,
                    "expirer_at" =>time()+$expirer_seconds
                ];
                //入库
                $tid =  TokenModel::insertGetId($data);
                $response = [
                    "error" => "0",
                    "msg" => "登陆成功",
                    "data"=>[
                        "token"=>$token,
                        "exprier_in" =>$expirer_seconds
                    ]
                ];
            }else{

                $response = [
                    "error" => "50001",
                    "msg" => "密码错误"
                ];
            }

        }else{
            //用户不存在
            $response = [
                "error" => "400001",
                "msg" => "用户不存在"
            ];

        }
        return $response;
    }
    public function register(Request $request)
    {
        $username = $request->post("username");
        $email = $request->post("email");
        $password = $request->post("password");
//        echo $password;echo "<hr/>";
//        dd(password_hash($password,PASSWORD_BCRYPT));
        $repassword = $request->post("repassword");

        $login = LoginModel::where(["username"=>$username])->first();

        if($login){
            $response = [
                "error" => "1231",
                "msg" => "用户名已存在"
            ];
            return $response;
        }

        if(empty($username)){
            $response = [
                "error" => "1231",
                "msg" => "用户名不能为空"
            ];
            return $response;
        }
        if(empty($password)){
            $response = [
                "error" => "1231",
                "msg" => "密码不能为空"
            ];
            return $response;
        }
        if(empty($email)){
            $response = [
                "error" => "1231",
                "msg" => "邮箱不能为空"
            ];
            return $response;
        }
        if(empty($repassword)){
            $response = [
                "error" => "1231",
                "msg" => "确认密码不能为空"
            ];
            return $response;
        }
        if($password!= $repassword){
            $response = [
                "error" => "1231",
                "msg" => "确认密码与密码保持一致"
            ];
            return $response;
        }
        $pass = password_hash($password,PASSWORD_BCRYPT);

        $userInfo = [
            "username" => $username,
            "email" => $email,
            "password" => $pass,
            "time" => time()
        ];
        $id = LoginModel::insertGetId($userInfo);
        if ($id) {

        $response = [
            "error" => "0",
            "msg" => "ok"
        ];
        return $response;
       }
    }
    public function center(Request $request)
    {
        $token = $request->get("token");
        if (empty($token)) {
            $response = [
                "errno" => "40003",
                "msg" => "未授权"
            ];
            return $response;
        }
        $t = TokenModel::where(["token"=>$token])->first();
        if(empty($t)){
            $response = [
                "errno" => "40003",
                "msg" => "token无效"
            ];
            return $response;
        }
        $user_info = LoginModel::find($t->uid);
        $response = [
            "errno" => 0,
            "msg" => "ok",
            "data"=>[
                "user_info"=> $user_info
            ]
        ];
        return $response;
    }
}

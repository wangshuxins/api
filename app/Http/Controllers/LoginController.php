<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Login AS LoginModel;
class LoginController extends Controller
{
    public function login(Request $request)
    {

        if (request()->isMethod("get")) {
            return view("login.login");
        }
        if(request()->isMethod("post")){
            $username = request()->post("username");
            $password = request()->post("password");

            if(empty($username)||empty($password)){

                return redirect("/login");

            }

            $user = LoginModel::where("username",$username)->first();

            if(empty($user)){
                return redirect("/login");
            }
            if(decrypt($user->password)!=$password){

                return redirect("/login");
            }

            return redirect("/");
        }
    }
    public function register(Request $request)
    {

        if (request()->isMethod("get")) {
            return view("login.register");
        }
        if(request()->isMethod("post")){
            $username = request()->post("username");
            $password = request()->post("password");
            $repassword = request()->post("repassword");
            if(empty($username)||empty($password)||empty( $repassword)){

                return redirect("/register");

            }else if($password!=$repassword){

                return redirect("/register");
            }else{
              $post = new LoginModel();
                unset($repassword);

                $data = [
                    "username"=>$username,
                    "password"=>encrypt($password),
                ];

                $save = $post::insert($data);

                if($save){
                    return redirect("/login");
                }
            }
        }
    }
}

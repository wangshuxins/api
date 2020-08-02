<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Goods;
use App\Model\Car;
class IndexController extends Controller
{
    public function index(){
        $goods = Goods::where("is_delete","=",1)->orderBy("goods_id","desc")->limit(6)->get();
        $hot_goods = Goods::where("is_delete","=",1)->orderBy("click_count","desc")->limit(6)->get();
        return view("hfive.index",compact("goods","hot_goods"));
    }
    public function goshop($goods_id){
        $goods = Goods::find($goods_id);
         $data = [
             "name" =>$goods->goods_name,
             "image"=>$goods->goods_img,
             "quantity"=>$goods->goods_number,
             "price"=>$goods->shop_price,
             "goods_id"=>$goods->goods_id,
         ];

        $car = new Car();
        $add = $car->insert($data);
        if($add){
            return redirect("/car");
        }else{
            return redirect("/");
        }
    }
}

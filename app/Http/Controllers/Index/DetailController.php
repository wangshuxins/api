<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Goods;
class DetailController extends Controller
{
    public function detail($goods_id){
         $detail = Goods::where("goods_id",$goods_id)->first();
        return view("hfive.detail",compact("detail"));
    }
}

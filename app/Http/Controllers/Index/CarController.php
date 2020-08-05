<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Car;
class CarController extends Controller
{
   public function car(){
       $car = Car::orderBy("time","desc")->get();
       $goods_total = Car::sum("price");
     return view("hfive.car",compact("car","goods_total"));
   }
}

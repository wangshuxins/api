<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Car;
class CarController extends Controller
{
   public function car(){
     $car = Car::where("is_delete",1)->orderBy("time","desc")->get();
     return view("hfive.car",compact("car"));
   }
}
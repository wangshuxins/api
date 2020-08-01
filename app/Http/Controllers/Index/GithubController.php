<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GithubController extends Controller
{
    public function git(){
        echo '<pre>';print_r($_GET);echo '</pre>';
    }
}

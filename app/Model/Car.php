<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $table = 'car';

    protected  $primaryKey = 'sid';

    public $timestamps = false;
}

<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'p_order_goods';

    protected  $primaryKey = 'oid';

    public $timestamps = false;
}

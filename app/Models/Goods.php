<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    protected $table = 'goods';

    protected $primaryKey = 'goods_id';

    protected $fillable = ['goods_name', 'goods_price'];

    public $timestamps = false;
    
}

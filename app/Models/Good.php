<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Good extends Model
{
    protected $table = 'goods';

    protected $primaryKey = 'good_id';

    protected $fillable = ['good_name', 'goog_price'];

    public $timestamps = false;
    
}

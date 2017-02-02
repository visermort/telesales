<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Additional extends Model
{
    protected $table = 'additional';

    protected $primaryKey = 'additional_id';

    protected $fillable = ['additional_name', 'additional_price'];

    public $timestamps = false;
}

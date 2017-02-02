<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'services';

    protected $primaryKey = 'services_id';

    protected $fillable = ['services_name', 'services_price'];

    public $timestamps = false;
}

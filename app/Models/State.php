<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $table = 'state';

    protected $primaryKey = 'state_id';

    protected $fillable = ['state_name', 'state_slug'];

    public $timestamps = false;
    
}

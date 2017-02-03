<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
//use App\Models\State;
use App\Models\Good;
use App\Models\Service;
use App\Models\Additional;
use Cartalyst\Sentinel\Users\EloquentUser;

class Order extends Model
{
    protected $table = 'orders';

    protected $primaryKey = 'order_id';

    protected $fillable = ['user_id', 'order_state_id', 'item_id', 'item_type'];

    public $timestamps = false;
    


    /**
     * пользователь
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('Cartalyst\Sentinel\Users\EloquentUser', 'user_id', 'id');
    }

    /**
     * статус заказа
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function state()
    {
        return $this->belongsTo('App\Models\State', 'order_state_id', 'state_id');
    }

    /**
     * тип заказа
     * @return mixed
     */
    public function type()
    {
        return config('telesales.itemTypes')[$this->item_type];
    }

    /**
     * предмет заказа
     * @return mixed
     */
    public function item()
    {
        $model = 'App\Models\\'.ucfirst($this->item_type);
        $id = $this->item_type.'_id';
        $name = $this->item_type.'_name';
        $price = $this->item_type.'_price';
        $obj = new $model();
        $obj = $obj->where($id, $this->item_id)->first();
        return [
            'name' => $obj->$name,
            'price' => $obj->$price,
        ];
    }

}

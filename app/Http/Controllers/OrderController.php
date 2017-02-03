<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Sentinel;

class OrderController extends Controller
{
    /**
     * выводим заказы
     * для админа все
     * для остальных = только свои
     * @return mixed
     */
    public function index()
    {
        $orders = Order::paginate(config('telesales.paginate'));
//        $user = Sentinel::check();
//        if ($user->email != config('telesales.adminEmail')) {
//            $orders = $orders->where('user_id', $user->id);
//        }
       // $orders = $orders->paginate(config('telesales.paginate'));

        return view('order.index', [
            'orders' => $orders,
        ]);
    }
    
    public function edit($orderId)
    {
        return $orderId;
    }
}

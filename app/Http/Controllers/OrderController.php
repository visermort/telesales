<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\State;
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
        $user = Sentinel::check();
        if ($user->email == config('telesales.adminEmail')) {
            $orders = Order::paginate(config('telesales.paginate'));
        } else {
            $orders = Order::where('user_id', $user->id)->paginate(config('telesales.paginate'));
        }
        $itemStates = State::all();

        return view('order.index', [
            'orders' => $orders,
            'item_states' => $itemStates,
        ]);
    }

    /**
     * новый заказ
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'item_type' => 'required|string|min:1',
            'item_id' => 'required|integer|exists:'.$request->item_type.','.$request->item_type.'_id',
            'order_state_id' => 'required|integer|exists:state,state_id',
        ]);
        $order = [
            'item_type' => $request->item_type,
            'item_id' => $request->item_id,
            'order_state_id' => $request->order_state_id,
            'user_id' => Sentinel::check()->id,
            ];
        Order::create($order);
        return redirect()->action('OrderController@index');
    }

    /**
     * редактирование заказа
     * @param $orderId
     * @return mixed
     */
    public function edit($orderId)
    {
        $order = Order::find($orderId);
        $itemStates = State::all();
        return view('order.edit', [
            'order' => $order,
            'item_states' => $itemStates,
        ]);
    }

    /**
     * изменение заказа
     * @param Request $request
     * @param $orderId
     * @return mixed
     */
    public function update(Request $request, $orderId)
    {
        $this->validate($request, [
            'item_type' => 'required|string|min:1',
            'item_id' => 'required|integer|exists:'.$request->item_type.','.$request->item_type.'_id',
            'order_state_id' => 'required|integer|exists:state,state_id',
        ]);
        $order = Order::find($orderId);
        $order->item_type = $request->item_type;
        $order->item_id = $request->item_id;
        $order->order_state_id = $request->order_state_id;
        $order->save();
        return redirect()->action('OrderController@index');
    }
    /**
     * ответ на ajax запрос
     * @param Request $request
     * @return mixed
     */
    public function getobjs(Request $request)
    {
        $model = 'App\Models\\' . ucfirst($request->obj);
        if (class_exists($model)) {
            $obj = new $model();
            $obj = $obj->all();
            return json_encode(['items' => $obj]);
        }
    }
}

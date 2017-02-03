<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Goods;

class GoodController extends Controller
{
    /**
     * list of goods
     * @return mixed
     */
    public function index()
    {
        $goods = Goods::paginate(config('telesales.paginate'));
        return view('admin.goods.index', [
            'goods' => $goods,
        ]);
    }

    /**
     * make new good
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'goods_name' => 'required|max:255|unique:goods,goods_name',
            'goods_price' => 'required|integer|min:1',
        ]);
        $good = [
            'goods_name' => $request->goods_name,
            'goods_price' => $request->goods_price,
        ];

        Goods::create($good);

        return redirect()->action('Admin\GoodController@index');
    }

    /**
     * edit good
     * @param Request $request
     * @param $goodId
     * @return mixed
     */
    public function edit(Request $request, $goodId)
    {
        $good = Goods::find($goodId);
        return view('admin.goods.edit', [
            'good' => $good,
        ]);
    }
    /**
     * update good
     * @param Request $request
     * @param $goodId
     * @return mixed
     */
    public function update(Request $request, $goodId)
    {
        $this->validate($request, [
            'goods_name' => 'required|max:255|unique:goods,goods_name,'.$goodId.',goods_id',
            'goods_price' => 'required|integer|min:1',
        ]);
        // dd($request);
        $good = Goods::find($goodId);
        $good->goods_name=$request->goods_name;
        $good->goods_price=$request->goods_price;
        $good->save();

        return redirect()->action('Admin\GoodController@index');
    }
}

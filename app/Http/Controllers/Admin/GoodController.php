<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Good;

class GoodController extends Controller
{
    /**
     * list of goods
     * @return mixed
     */
    public function index()
    {
        $goods = Good::paginate(config('telesales.paginate'));
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
            'good_name' => 'required|max:255|unique:goods,good_name',
            'good_price' => 'required|integer|min:1',
        ]);
        $good = [
            'good_name' => $request->good_name,
            'good_price' => $request->good_price,
        ];

        Good::create($good);

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
        $good = Good::find($goodId);
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
            'good_name' => 'required|max:255|unique:goods,good_name,'.$goodId.',good_id',
            'good_price' => 'required|integer|min:1',
        ]);
        // dd($request);
        $good = Good::find($goodId);
        $good->good_name=$request->good_name;
        $good->good_price=$request->good_price;
        $good->save();

        return redirect()->action('Admin\GoodController@index');
    }
}

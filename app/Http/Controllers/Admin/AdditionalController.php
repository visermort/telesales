<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Additional;

class AdditionalController extends Controller
{
    /**
     * list of Additional
     * @return mixed
     */
    public function index()
    {
        $additionals = Additional::paginate(config('telesales.paginate'));
        //dd($additional);
        return view('admin.additional.index', [
            'additionals' => $additionals,
        ]);
    }

    /**
     * make new additional
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'additional_name' => 'required|max:255|unique:additional,additional_name',
            'additional_price' => 'required|integer|min:1',
        ]);
        $additional = [
            'additional_name' => $request->additional_name,
            'additional_price' => $request->additional_price,
        ];

        Additional::create($additional);

        return redirect()->action('Admin\AdditionalController@index');
    }
    /**
     * edit additional
     * @param Request $request
     * @param $additionalId
     * @return mixed
     */
    public function edit(Request $request, $additionalId)
    {
        $additional = Additional::find($additionalId);
        return view('admin.additional.edit', [
            'additional' => $additional,
        ]);
    }
    /**
     * update additional
     * @param Request $request
     * @param $additionalId
     * @return mixed
     */
    public function update(Request $request, $additionalId)
    {
        $this->validate($request, [
            'additional_name' => 'required|max:255|unique:additional,additional_name,'.$additionalId.',additional_id',
            'additional_price' => 'required|integer|min:1',
        ]);
        // dd($request);
        $additional = Additional::find($additionalId);
        $additional->additional_name=$request->additional_name;
        $additional->additional_price=$request->additional_price;
        $additional->save();

        return redirect()->action('Admin\AdditionalController@index');
    }
}

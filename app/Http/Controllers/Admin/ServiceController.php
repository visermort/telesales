<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Services;

class ServiceController extends Controller
{
    /**
     * list of servides
     * @return mixed
     */
    public function index()
    {
        $services = Services::paginate(config('telesales.paginate'));
        //dd($services);
        return view('admin.services.index', [
            'services' => $services,
        ]);
    }

    /**
     * make new service
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'services_name' => 'required|max:255|unique:services,services_name',
            'services_price' => 'required|integer|min:1',
        ]);
        $services = [
            'services_name' => $request->services_name,
            'services_price' => $request->services_price,
        ];

        Services::create($services);

        return redirect()->action('Admin\ServiceController@index');
    }
    /**
     * edit service
     * @param Request $request
     * @param $serviceId
     * @return mixed
     */
    public function edit(Request $request, $serviceId)
    {
        $service = Services::find($serviceId);
        return view('admin.services.edit', [
            'service' => $service,
        ]);
    }
    /**
     * update service
     * @param Request $request
     * @param $serviceId
     * @return mixed
     */
    public function update(Request $request, $serviceId)
    {
        $this->validate($request, [
            'services_name' => 'required|max:255|unique:services,services_name,'.$serviceId.',services_id',
            'services_price' => 'required|integer|min:1',
        ]);
        // dd($request);
        $service = Services::find($serviceId);
        $service->services_name=$request->services_name;
        $service->services_price=$request->services_price;
        $service->save();

        return redirect()->action('Admin\ServiceController@index');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\State;

class StateController extends Controller
{
    /**
     * list of states
     * @return mixed
     */
    public function index()
    {
        $states = State::paginate(config('telesales.paginate'));
        //dd($state);
        return view('admin.state.index', [
            'states' => $states,
        ]);
    }

    /**
     * make new state
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'state_name' => 'required|max:255|unique:state,state_name',
            'state_slug' => 'required|max:255|unique:state,state_slug',
        ]);
        $state = [
            'state_name' => $request->state_name,
            'state_slug' => $request->state_slug,
        ];

        State::create($state);

        return redirect()->action('Admin\StateController@index');
    }
    /**
     * edit state
     * @param Request $request
     * @param $stateId
     * @return mixed
     */
    public function edit(Request $request, $stateId)
    {
        $state = State::find($stateId);
        return view('admin.state.edit', [
            'state' => $state,
        ]);
    }
    /**
     * update state
     * @param Request $request
     * @param $stateId
     * @return mixed
     */
    public function update(Request $request, $stateId)
    {
        $this->validate($request, [
            'state_name' => 'required|max:255|unique:state,state_name,'.$stateId.',state_id',
            'state_slug' => 'required|max:255|unique:state,state_slug,'.$stateId.',state_id',
        ]);
        $state = State::find($stateId);
        $state->state_name=$request->state_name;
        $state->state_slug=$request->state_slug;
        $state->save();

        return redirect()->action('Admin\StateController@index');
    }
}

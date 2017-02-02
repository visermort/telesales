<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Sentinel;
use Cartalyst\Sentinel\Users\EloquentUser as Users;

/**
 * manage users
 * Class UsersController
 * @package App\Http\Controllers\Admin
 */
class UsersController extends Controller
{
    /**
     * users list
     * @return mixed
     */
    public function index()
    {
        $users = Users::paginate(config('telesales.paginate'));
        return view('admin.users.index', [
            'users' => $users,
        ]);
    }

    /**
     * make new user
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required|max:255',
            'email' => 'required|email|unique:users,email',
        ]);
        $credentials = [
            'email' => $request->email,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'password' => bcrypt(mt_rand(10000, 9999999)),
        ];

        Sentinel::create($credentials);

        return redirect()->action('Admin\UsersController@index');
    }

    /**
     * edit user
     * @param Request $request
     * @param $userId
     * @return mixed
     */
    public function edit(Request $request, $userId)
    {
        $user = Sentinel::findById($userId);
        return view('admin.users.edit', [
            'user' => $user,
        ]);
    }

    /**
     * update user
     * @param Request $request
     * @param $userId
     * @return mixed
     */
    public function update(Request $request, $userId)
    {
        $this->validate($request, [
            'first_name' => 'required|max:255',
            'email' => 'required|email|unique:users,email,'.$userId.',id',
        ]);
       // dd($request);
        $user = Sentinel::findById($userId);
        $user->first_name=$request->first_name;
        $user->last_name=$request->last_name;
        $user->email=$request->email;
        $user->save();

        return redirect()->action('Admin\UsersController@index');
    }
}

<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Sentinel;

/**
 * Class CartalistController
 * @package App\Http\Controllers\Auth
 */
class CartalistController extends Controller
{
    /**
     * show login form
     * @return mixed
     */
    public function index()
    {
        return view('auth.login');
    }


    public function login(Request $request)
    {
        //dd($request);
        $this->validate($request, [
            'email' => 'required:email',
            'password' => 'required|min:6',
            'remember'  => 'boolean',

        ]);
        $credentials = [
            'email'    => $request->email,
            'password' => $request->password,
        ];
        if ($request->remember) {
            $user = Sentinel::authenticate($credentials);
        } else {
            $user = Sentinel::authenticateAndRemember($credentials);
        }
        return redirect()->action('HomeController@index');
    }

    /**
     * show registerform
     * @return mixed
     */
    public function registerForm()
    {
        return view('auth.register');
    }

    /**
     * процесс регистрации
     * @param Request $request
     * @return mixed
     */
    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required:email|unique:users,email',
            'password' => 'required|min:6|confirmed'
        ]);
        $credentials = [
            'email'    => $request->email,
            'password' => $request->password,
            'first_name' => $request->name,
            'last_name' => $request->lastname,
            ];
        $user = Sentinel::registerAndActivate($credentials);
        if ($user) {
             return view('common.messages', [
                 'status' => true,
                 'message' => $user->first_name.' '.$user->last_name.
                     ' Вы зарегистрированы. Cпасибо за интерес к нашему сайту!',
                 'title' => 'Регистрация',
             ]);
        } else {
            return view('common.messages', [
                'status' => false,
                'message' => 'Произошла ошибка при регистрации, приносим свои извинения, попробуйте это сделать позже.',
                'title' => 'Регистрация',
            ]);
        }
    }

    /**
     * @return mixed
     */
    public function logout()
    {
        Sentinel::logout();
        return redirect('/');
    }
    
    
}

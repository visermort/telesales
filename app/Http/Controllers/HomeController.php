<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{
    /**
     * main page after register
     * @return mixed
     */
    public function index()
    {
        return view('home');
    }
}

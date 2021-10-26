<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
//        dd(123);
        return view('home.index');
    }

    public function exit()
    {
        //用户退出
        session()->pull('admin');
        return view('admin.login');
    }

}

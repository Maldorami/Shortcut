<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HomeCompany extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:company');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('homeCompany')->with('user', json_decode(Auth::guard('company')->user(), true));
    }
}

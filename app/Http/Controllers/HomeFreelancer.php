<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
class HomeFreelancer extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:freelancer');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::guard('freelancer')->check()){
            return view('homeFreelancer')->with('user', json_decode(Auth::guard('freelancer')->user(), true));
        }
    }
}
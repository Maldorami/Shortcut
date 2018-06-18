<?php

namespace App\Http\Controllers;

use App\Freelancer;
use Illuminate\Support\Facades\Input;
use App\Rules\Genre;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Auth;

class FreelancerController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest:freelancer')->except('logout');
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        Auth::guard('freelancer')->logout();
        return redirect()->route('freelancersLogin');
    }

    public function showRegisterForm()
    {
        return view('FreelancerRegister');
    }

    public function registrarFreelancer(Request $request)
    {
        $this->validation($request);
        $data = $request->all();
        $data['avatar'] = $this->UploadAvtar();
        $data['password'] = Hash::make($data['password']);       
        Freelancer::create($data);
        return redirect()->route('freelancersLogin')->with('Status', 'Te has registrado como Freelancer!');
    }

    public function showLoginForm()
    {        
        return view('FreelancerLogin');
    }

    public function loginFreelancer(Request $request)
    {   
       $this->validateLogin($request);

       if(Auth::guard('freelancer')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember))
        {
            return redirect('/homeFreelancer')->with('Status', 'You are logged!');
        }

        return redirect('/freelancersLogin')->with('LogError', 'Usuario o contraseña incorrecta');
    }

    public function validation(Request $request){
       return $this->validate($request, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'genre' => ['required'],
            'birthdate' => ['required', 'date'],
            'email' => ['required','email','max:255','unique:freelancers'],
            'password' => ['required','confirmed','min:6','max:255'],
            'avatar' => ['required', 'image'],
        ]);
    }

    public function UploadAvtar(){
        if(Input::hasFile('avatar')){
            $file = Input::file('avatar');

            $dt = Carbon::parse(Carbon::now());
            $destinationPath = public_path(). '/avatars/';
            $filename = $dt->hour . $dt->minute . $dt->second . $dt->micro . $file->getClientOriginalName();
            $file->move($destinationPath, $filename);  

            return '/avatars/' . $filename;
        }
    }

    public function validateLogin($request){
        return $this->validate($request, [
            'email' => ['required','email','max:255'],
            'password' => ['required','min:6','max:255'],
        ]);
    }
}

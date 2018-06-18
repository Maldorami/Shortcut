<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Support\Facades\Input;
use App\Rules\Genre;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Auth;

class CompanyController extends Controller
{
	public function __construct()
    {
        $this->middleware('guest:company')->except('logout');
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        Auth::guard('company')->logout();
        return redirect()->route('companiesLogin');
    }

	public function showRegisterForm()
	{
		return view('CompanyRegister');
	}

	public function registrarCompany(Request $request)
	{
		$this->validation($request);
		$data = $request->all();
		$data['avatar'] = $this->UploadAvtar();
		$data['password'] = Hash::make($data['password']);       
		Company::create($data);
		return redirect()->route('companiesLogin')->with('Status', 'Te has registrado como Company!');
	}

	public function showLoginForm()
	{
        $this->middleware('guest:company');
		return view('CompanyLogin');
	}

	public function loginCompany(Request $request)
	{
		$this->validateLogin($request);

		if(Auth::guard('company')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)){
			return redirect('/homeCompany');
		}

		return redirect('/companiesLogin')->with('LogError', 'Usuario o contraseña incorrecta');
	}

	public function validation(Request $request)
	{
		return $this->validate($request, [
			'company_name' => ['required', 'string', 'max:255'],
			'email' => ['required','email','max:255','unique:companies'],
			'password' => ['required','confirmed','min:6','max:255'],
			'avatar' => ['required', 'image'],
		]);
	}

	public function UploadAvtar()
	{
		if(Input::hasFile('avatar')){
			$file = Input::file('avatar');

			$dt = Carbon::parse(Carbon::now());
			$destinationPath = public_path(). '/avatars/';
			$filename = $dt->hour . $dt->minute . $dt->second . $dt->micro . $file->getClientOriginalName();
			$file->move($destinationPath, $filename);  

			return '/avatars/' . $filename;
		}
	}

	public function validateLogin($request)
	{
		return $this->validate($request, [
			'email' => ['required','email','max:255'],
			'password' => ['required','min:6','max:255'],
		]);
	}
}

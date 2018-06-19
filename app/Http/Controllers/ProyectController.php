<?php

namespace App\Http\Controllers;

use App\Proyect;
use Illuminate\Http\Request;

class ProyectController extends Controller
{

	public function __construct()
    {
        $this->middleware('auth:company');
    }

    public function showCreateForm()
    {
    	return view('createProyect');
    }

    public function createPoryect(Request $request)
    {
    	$this->validation($request);
        $data = $request->all();      
        Proyect::create($data);
        return redirect('/');
    }

    public function validation(Request $request){
       return $this->validate($request, [
            'company_id' => ['required', 'integer', 'min:0'],
            'title' => ['required', 'string', 'max:100'],
            'description' => ['required', 'string', 'max:1000'],
            'team_size' => ['required', 'integer', 'min:1', 'max:50'],
        ]);
    }
}

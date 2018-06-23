<?php

namespace App\Http\Controllers;

use App\Proyect;
use App\Freelancer;
use Auth;
use Illuminate\Http\Request;

class ProyectController extends Controller
{

    public function showCreateForm()
    {
        $this->middleware('guest:freelancer');
        return view('createProyect');
    }

    public function createPoryect(Request $request)
    {
        $this->middleware('guest:freelancer');
        $this->validation($request);
        $data = $request->all();      
        Proyect::create($data);
        return redirect('/');
    }

    public function showProyects()
    {
        $this->middleware('guest:freelancer');
        $proyects = [];
        $freelancers = [];

        if(Auth::guard('company')->check())
        {
            $proyects = Proyect::all()->where('company_id' , '=', Auth::guard('company')->user()->id);

            if(count($proyects) > 0){
                foreach($proyects as $proyect)
                    $freelancers[$proyect->id] = $proyect->freelancers;
            }


            return view('proyects')->with(['proyects' => $proyects, 'freelancers' => $freelancers]);
        }
    }

    public function validation(Request $request){
        return $this->validate($request, [
            'company_id' => ['required', 'integer', 'min:0'],
            'title' => ['required', 'string', 'max:100'],
            'description' => ['required', 'string', 'max:1000'],
            'team_size' => ['required', 'integer', 'min:1', 'max:50'],
        ]);
    }

    public function showAllProyects()
    {
        $this->middleware('auth:freelancers');

        $freelancers = [];
        
        $proyects = Proyect::all()->filter(function ($value, $key) {
           return !$value->freelancers->contains(Auth::guard('freelancer')->user()->id) && count($value->freelancers) < $value->team_size;
       });

        if(count($proyects) > 0)
        {
            foreach($proyects as $proyect)
            {
                $freelancers[$proyect->id] = $proyect->freelancers;
            }
        }

        return view('proyectosParaFreelancers')->with(['proyects' => $proyects, 'freelancers' => $freelancers]);
    }

    public function joinProyect(Request $request)
    {
        $this->middleware('guest:company');
        $data = $request->all();
        $proyect = Proyect::Find($data['proyect_id']);
        $proyect->freelancers()->attach($data['freelancer_id']);

        $freelancers = [];


        $proyects = Proyect::all()->filter(function ($value, $key) {
           return !$value->freelancers->contains(Auth::guard('freelancer')->user()->id) && count($value->freelancers) < $value->team_size;
       });

        
        if(count($proyects) > 0)
        {
            foreach($proyects as $proyect)
            {
                $freelancers[$proyect->id] = $proyect->freelancers;
            }
        }

        return view('proyectosParaFreelancers')->with(['proyects' => $proyects, 'freelancers' => $freelancers]);
    }

    public function showMyProyects()
    {        
        $this->middleware('guest:company');

        $freelancers = [];
        $proyects = Freelancer::Find(Auth::guard('freelancer')->user()->id)->proyects;

        if(count($proyects) > 0)
        {
            foreach($proyects as $proyect)
            {
                $freelancers[$proyect->id] = $proyect->freelancers;
            }
        }

        return view('proyectosDeFreelancer')->with(['proyects' => $proyects, 'freelancers' => $freelancers]);
    }

    public function UnattachProyect(Request $request){
        $this->middleware('guest:company');
        $data = $request->all();
        $proyect = Proyect::Find($data['proyect_id']);
        $proyect->freelancers()->detach($data['freelancer_id']);

        $freelancers = [];
        $proyects = Freelancer::Find(Auth::guard('freelancer')->user()->id)->proyects;

        
        if(count($proyects) > 0)
        {
            foreach($proyects as $proyect)
            {
                $freelancers[$proyect->id] = $proyect->freelancers;
            }
        }

         return view('proyectosDeFreelancer')->with(['proyects' => $proyects, 'freelancers' => $freelancers]);
    }
    
}

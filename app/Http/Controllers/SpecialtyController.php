<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Specialty;

class SpecialtyController extends Controller
{
    public function _construct(){
        $this->middleware('auth');
    }
    
    public function index(){

        $specialties = Specialty::all();
        // dd($specialties);
        return view('specialties.index', compact('specialties'));
    }

    public function create(){
        return view('specialties.create');
    }

    public function store(Request $request){
        $rules = [
            'name' => 'required|min:3'
        ];

        $msg = [
            'name.required' => 'El campo nombre es requerido',
            'name.min'      => 'El nombre debe contener al menos 3 letras'
        ];

        $this->validate($request, $rules, $msg);

        $specialty = new Specialty();
        $specialty->name = $request->name;
        $specialty->description = $request->description;
        $specialty->save();

        return redirect('/specialties');
    }

    public function edit(Specialty $specialty){
        
        return view('specialties.edit', compact('specialty'));
    }

    public function update(Request $request, Specialty $specialty){
        // dd($request->all());
        $rules = [
            'name' => 'required|min:3'
        ];

        $msg = [
            'name.required' => 'El campo nombre es requerido',
            'name.min'      => 'El nombre debe contener al menos 3 letras'
        ];

        $this->validate($request, $rules, $msg);
        $specialty = Specialty::find($request->id_specialty);
        $specialty->name = $request->name;
        $specialty->description = $request->description;
        $specialty->save();

        return redirect('/specialties');
    }
}

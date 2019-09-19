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
        // dd($request->all());

        $specialty = new Specialty();
        $specialty->name = $request->name;
        $specialty->description = $request->description;
        $specialty->save();

        return redirect('/specialties');
    }
}

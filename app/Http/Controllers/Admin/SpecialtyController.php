<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Specialty;
use Session;
use App\Http\Controllers\Controller;

class SpecialtyController extends Controller
{
    public function index(){
 
        $specialties = Specialty::all();

        return view('specialties.index', compact('specialties'));
    }

    public function create(){
        return view('specialties.create');
    }

    private function performValidation(Request $request){
        $rules = [
            'name' => 'required|min:3'
        ];

        $msg = [
            'name.required' => 'El campo nombre es requerido',
            'name.min'      => 'El nombre debe contener al menos 3 letras'
        ];

        $this->validate($request, $rules, $msg);
    }

    public function store(Request $request){

        $this->performValidation($request);

        $specialty = new Specialty();
        $specialty->name = $request->name;
        $specialty->description = $request->description;
        $specialty->save();

        $notification = 'Especialidad registrada correctamente';

        return redirect('/specialties')->with(compact('notification'));
    }

    public function edit(Specialty $specialty){

        return view('specialties.edit', compact('specialty'));
    }

    public function update(Request $request, Specialty $specialty){
        
        $this->performValidation($request);

        $specialty = Specialty::find($request->id_specialty);
        $specialty->name = $request->name;
        $specialty->description = $request->description;
        $specialty->save();

        $notification = 'Especialidad actualizada correctamente';

        return redirect('/specialties')->with(compact('notification'));
    }

    public function destroy(Request $request){
        
        $response=[];
        $specialty = Specialty::find($request->idEspecialidad);
        $result = $specialty->delete();

        if ($result) {
            $response['status'] = 'success';
            $response['msg'] = 'Especialidad borrada correctamente';
        } else {
            $response['status'] = 'error';
            $response['msg'] = 'Ocurrió un error!';
        }

        return response()->json($response);
    }
}

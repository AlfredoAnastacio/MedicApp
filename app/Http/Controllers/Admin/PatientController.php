<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\User;
use App\Http\Controllers\Controller;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patients = User::patients()->paginate(5);

        return view('patients.index', compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('patients.create');
    }

    private function performValidation(Request $request){
        $rules = [
            'name' => 'required|min:3',
            'email'=> 'required|email',
            'dni' => 'nullable|digits:8',
            'adddres' => 'nullable|min:5',
            'phone' => 'nullable|min:10'
        ];

        $msg = [
            'name.required' => 'El campo nombre es requerido',
            'name.min'      => 'El nombre debe contener al menos 3 letras',
            'email.required'=> 'Debe ingresar un dirección de correo válida',
            'dni.digits'    => 'El DNI debe contener sólo 8 digitos'
        ];

        $this->validate($request, $rules, $msg);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->performValidation($request);

        $patient = new User();
        $patient->name = $request->name;
        $patient->email = $request->email;
        $patient->password = bcrypt($request->password);
        $patient->dni = $request->dni;
        $patient->address = $request->address;
        $patient->phone = $request->phone;
        $patient->role = 'patient';
        $patient->save();

        $notification = 'Paciente registrado correctamente';

        return redirect('/patients')->with(compact('notification'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $patient = User::patients()->findOrFail($id);

        return view('patients.edit')->with(compact('patient'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->performValidation($request);

        $patient = User::patients()->findOrFail($id);
        
        $patient->name = $request->name;
        $patient->email = $request->email;
        if ($request->password) {
            $patient->password = bcrypt($request->password);
        }
        $patient->dni = $request->dni;
        $patient->address = $request->address;
        $patient->phone = $request->phone;

        $patient->save();

        $notification = 'Los datos del paciente se actualizaron correctamente';

        return redirect('/patients')->with(compact('notification'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $response=[];
        $patient = User::patients()->findOrFail($request->idPacient);
        $result = $patient->delete();

        if ($result) {
            $response['status'] = 'success';
            $response['msg'] = 'Paciente eliminado correctamente';
        } else {
            $response['status'] = 'error';
            $response['msg'] = 'Ocurrió un error!';
        }

        return response()->json($response);
    }
}

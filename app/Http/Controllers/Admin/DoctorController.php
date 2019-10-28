<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\User;
use App\Http\Controllers\Controller;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctors = User::doctors()->paginate(5);

        return view('doctors.index', compact('doctors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('doctors.create');
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
        // dd($request->all());
        $this->performValidation($request);

        $doctor = new User();
        $doctor->name = $request->name;
        $doctor->email = $request->email;
        $doctor->password = bcrypt($request->password);
        $doctor->dni = $request->dni;
        $doctor->address = $request->address;
        $doctor->phone = $request->phone;
        $doctor->role = 'doctor';
        $doctor->save();

        $notification = 'Doctor registrado correctamente';

        return redirect('/doctors')->with(compact('notification'));
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
        $doctor = User::doctors()->findOrFail($id);

        return view('doctors.edit')->with(compact('doctor'));
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
        // dd($request->all());
        $this->performValidation($request);

        $doctor = User::doctors()->findOrFail($id);
        
        $doctor->name = $request->name;
        $doctor->email = $request->email;
        if ($request->password) {
            $doctor->password = bcrypt($request->password);
        }
        $doctor->dni = $request->dni;
        $doctor->address = $request->address;
        $doctor->phone = $request->phone;

        $doctor->save();

        $notification = 'Los datos del doctor se actualizaron correctamente';

        return redirect('/doctors')->with(compact('notification'));
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
        $doctor = User::doctors()->findOrFail($request->idDoctor);
        $result = $doctor->delete();

        if ($result) {
            $response['status'] = 'success';
            $response['msg'] = 'Doctor eliminado correctamente';
        } else {
            $response['status'] = 'error';
            $response['msg'] = 'Ocurrió un error!';
        }

        return response()->json($response);
    }
}

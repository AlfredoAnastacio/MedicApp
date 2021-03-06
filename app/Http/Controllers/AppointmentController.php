<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Specialty;
use App\Appointment;
use Carbon\Carbon;

class AppointmentController extends Controller
{
    public function create (){

        $specialties = Specialty::all();

        $specialtyId =  old('specialty_id');

        if ($specialtyId) {
            $specialty = Specialty::find($specialtyId);
            $doctors = $specialty->users;
        } else {
            $doctors = collect();
        }
        return view('appointment.create', compact('specialties', 'doctors'));
    }

    public function store(Request $request){

        $rules = [
            'description' => 'required',
            'specialty_id' => 'exists:specialties,id',
            'doctor_id' => 'exists:users,id',
            'scheduled_time' => 'required'
        ];

        $messages = [
            'scheduled_time.required' => 'Por favor seleccione una hora válida para su cita'
        ];

        $this->validate($request, $rules, $messages);

        $data = $request->only([
            'id',
            'description',
            'specialty_id',
            'doctor_id',
            'scheduled_date',
            'scheduled_time',
            'type'
        ]);

        $data['patient_id'] = auth()->id();
        $carbonTime = Carbon::createFromFormat('g:i A', $data['scheduled_time']);
        $data['scheduled_time'] = $carbonTime->format('H:i:s');

        Appointment::create($data);

        $notitifacion = 'La cita se ha registrado correctamente';

        return back()->with(compact('notificacion'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Specialty;
use App\Appointment;

class AppointmentController extends Controller
{
    public function create (){

        $specialties = Specialty::all();
        
        return view('appointment.create', compact('specialties'));
    }

    public function store(Request $request){
        $data = $request->only([
            'id',
            'description',
            'specialty_id',
            'doctor_id',
            'patient_id',
            'scheduled_date',
            'scheduled_time',
            'type'
        ]);

        Appointment::create($data);

        $notitifacion = 'La cita se ha registrado correctamente';

        return back()->with(compact('notificacion'));
    }
}

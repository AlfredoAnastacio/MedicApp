<?php

namespace App\Http\Controllers\Doctor;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\workDay;
use carbon\Carbon;

class ScheduleController extends Controller
{
    public function edit(){
        $days = [
            'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo'
        ];
        // dd();
        $workDays = workDay::where('user_id', auth::user()->id)->get();

        $workDays->map(function($workDay){
            $workDay->morning_start = (new Carbon($workDay->morning_start))->format('g:i A');
            $workDay->morning_end = (new Carbon($workDay->morning_end))->format('g:i A');
            $workDay->afternoon_start = (new Carbon($workDay->afternoon_start))->format('g:i A');
            $workDay->afternoon_end = (new Carbon($workDay->afternoon_end))->format('g:i A');
            
            return $workDay;
        });
        return view('schedule', compact('workDays', 'days'));
    }

    public function store(Request $request){
        // dd($request->all());
        $active = $request->active ?: [];
        $morning_start = $request->morning_start;
        $morning_end = $request->morning_end;
        $afternoon_start = $request->afternoon_start;
        $afternoon_end = $request->afternoon_end;

        for ($i=0; $i < 7; $i++) {
            // dd($morning_start[$i]);
            workDay::updateOrCreate(
                [
                    'day' => $i,
                    'user_id' => auth()->user()->id
                ],
                [
                    'active' => in_array($i, $active),
                    'morning_start' => $morning_start[$i],
                    'morning_end' => $morning_end[$i],
                    'afternoon_start' => $afternoon_start[$i],
                    'afternoon_end' => $afternoon_end[$i]
                ]
            );
        }
        return back();
    }
}

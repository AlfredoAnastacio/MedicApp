<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Wordday;
use Carbon\Carbon;

class ScheduleController extends Controller
{
    public function hours(Request $request) {
        $date = $request->date;
        $dateCarbon = new Carbon($date);

        $i = $dateCarbon->dayOfWeek;
        $day = ($i==0 ? 6 : $i-1);

        $doctorId = $request->doctor_id;

        $hours = WorkDay::where('active', true)->where('day', $day)->where('user_id', $doctorId);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Overtimes;
use Illuminate\Http\Request;

class OvertimesController extends Controller
{
    //
    public function create(Request $request){
        $validated = $request->validate([
            'employee_id' => 'required|numeric',
            'date' => 'required|unique:overtimes,employee_id,date',
            'time_started' => 'required',
            'time_ended' => 'required',
        ]);

        $overtime = new Overtimes();

        $overtime->employee_id = $request->employee_id;
        $overtime->date = date_create($request->date)->format('Y-m-d');
        $overtime->time_started = date_create($request->time_started)->format('Y-m-d H:m');
        $overtime->time_ended = date_create($request->time_ended)->format('Y-m-d H:m');
        $overtime->save();

        return response()->json($overtime);
    }
}

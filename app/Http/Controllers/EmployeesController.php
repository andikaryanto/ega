<?php

namespace App\Http\Controllers;

use App\Models\Employees;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    //

    public function create(Request $request){
        $validated = $request->validate([
            'name' => 'required|unique:employees|min:2|alpha_num',
            'salary' => 'required|numeric|between:2000000,10000000',
        ]);

        $employee = new Employees();

        $employee->name = $request->name;
        $employee->salary = $request->salary;
        $employee->save();

        return response()->json($employee);
    }
}

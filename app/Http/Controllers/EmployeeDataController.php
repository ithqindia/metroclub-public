<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\EmployeeDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class EmployeeDataController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'employer_name' => 'required',
            'employer_address' => 'required|min:10|max:100',
            'job_title' => 'required',
            'employment_status' => 'required',
            'employment_start' => 'required|date',
            'employment_end' => 'required|date|after_or_equal:employment_start',
        ]);
        EmployeeDetail::create([
            'user_id' => Auth::user()->id,
            'employer_name' => $request->get('employer_name'),
            'employer_address' => $request->get('employer_address'),
            'job_title' => $request->get('job_title'),
            'employment_status' => $request->get('employment_status'),
            'employment_start' => $request->get('employment_start'),
            'employment_end' => $request->get('employment_end'),

        ]);
        Session::flash('message', 'Data inserted successfully !');
        return redirect('/me/employee');
    }

    public function show()
    {   $user = Auth::user();
        $employee = EmployeeDetail::where('user_id', $user->id)->get()->first();


        if ($employee) {
            // If data is present then show data
            return view('student.employee-form', compact('user', 'employee'));
        } else {
            // If no data is present then show form
            return view('student.employee-form', compact('user','employee'));
        }
    }

    public function update(Request $request)
    {   $user = Auth::user();
        $employee = EmployeeDetail::where('user_id', $user->id)->get()->first();
        $request->validate([
            'employer_name' => 'required',
            'employer_address' => 'required|min:10|max:100',
            'job_title' => 'required',
            'employment_status' => 'required',
            'employment_start' => 'required|date',
            'employment_end' => 'required|date|after_or_equal:employment_start',
        ]);

        $employee->user_id = $user->id;
        $employee->employer_name = $request->get('employer_name');
        $employee->employer_address = $request->get('employer_address');
        $employee->job_title = $request->get('job_title');
        $employee->employment_status = $request->get('employment_status');
        $employee->employment_start = $request->get('employment_start');
        $employee->employment_end = $request->get('employment_end');
        $employee->save();
        Session::flash('message', 'Data updated successfully !');
        return redirect('/me/employment-information');
    }
}

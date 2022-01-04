<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Diploma;
use App\Models\Graduation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class EducationalInformationGraduationController extends Controller
{
    public function store(Request $request, $id)
    {
        $request->validate([
            'graduation_college' => 'required|min:5|max:20',
            'graduation_university' => 'required|min:5|max:20',
            'graduation_aggregates' => 'required|numeric|between:0,99.99',
            'graduation_major' => 'required|min:5|max:20',
            'graduation_langauge' => 'required|min:3|max:20',
            'graduation_year_from' => 'required|size:4|digits:4',
            'graduation_year_to' => 'required|size:4|digits:4',
        ]);

        Graduation::create([
            'user_id' => $id,
            'graduation_college' => $request->get('graduation_college'),
            'graduation_university' => $request->get('graduation_university'),
            'graduation_aggregates' => $request->get('graduation_aggregates'),
            'graduation_major' => $request->get('graduation_major'),
            'graduation_langauge' => $request->get('graduation_langauge'),
            'graduation_year_from' => $request->get('graduation_year_from'),
            'graduation_year_to' => $request->get('graduation_year_to'),
        ]);
        Session::flash('message', 'Data added successfully !');
        return redirect('/students');
    }

    public function show()
    {
        $user = Auth::user();
        $graduationInformation = Graduation::where('user_id', $user->id)->get()->first();
        if ($graduationInformation) {
            // If data is present then show data
            return view('student.graduation-form', compact('user', 'graduationInformation'));
        } else {
            // If no data is present then show form
            return view('student.graduation-form', compact('user', 'actionUrl'));
        }
    }

    public function edit()
    {
        $user = Auth::user();
        $graduationInformation =  Diploma::where('user_id', $user->id)->get()->first();
        return view('student.graduation-form', compact('user', 'graduationInformation'));
    }

    public function update(Request $request, $id)
    {
        $graduationInformation = Graduation::where('user_id', $id)->get()->first();
        $request->validate([
            'graduation_college' => 'required|min:5|max:20',
            'graduation_university' => 'required|min:5|max:20',
            'graduation_aggregates' => 'required|numeric|between:0,99.99',
            'graduation_major' => 'required|min:5|max:20',
            'graduation_langauge' => 'required|min:3|max:20',
            'graduation_year_from' => 'required|size:4|digits:4',
            'graduation_year_to' => 'required|size:4|digits:4',
        ]);

        $graduationInformation->user_id = $id;
        $graduationInformation->graduation_college = $request->get('graduation_college');
        $graduationInformation->graduation_university = $request->get('graduation_university');
        $graduationInformation->graduation_aggregates = $request->get('graduation_aggregates');
        $graduationInformation->graduation_major = $request->get('graduation_major');
        $graduationInformation->graduation_langauge = $request->get('graduation_langauge');
        $graduationInformation->graduation_year_from = $request->get('graduation_year_from');
        $graduationInformation->graduation_year_to = $request->get('graduation_year_to');
        $graduationInformation->save();
        Session::flash('message', 'Data Updated successfully !');
        return redirect('/students/' . $id);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Diploma;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class EducationalInformationDiplomaController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'diploma_college' => 'required|min:5|max:20',
            'diploma_university' => 'required|min:5|max:20',
            'diploma_aggregates' => 'required|numeric|between:0,99.99',
            'out_of' => 'required|size:4|digits:3',
            'diploma_major' => 'required|min:5|max:20',
            'major_title' => 'required|min:4|max:20',
            'diploma_langauge' => 'required|min:3|max:20',
            'diploma_year_form' => 'required|size:4|digits:4',
            'diploma_year_to' => 'required|size:4|digits:4',
            'completion_status' => 'required',
        ]);

        Diploma::create([
            'user_id' => Auth::user()->id,
            'diploma_college' => $request->get('diploma_college'),
            'diploma_university' => $request->get('diploma_university'),
            'diploma_aggregates' => $request->get('diploma_aggregates'),
            'out_of' => $request->get('out_of'),
            'diploma_major' => $request->get('diploma_major'),
            'major_title' => $request->get('major_title'),
            'diploma_langauge' => $request->get('diploma_langauge'),
            'diploma_year_form' => $request->get('diploma_year_form'),
            'diploma_year_to' => $request->get('diploma_year_to'),
            'completion_status' => $request->get('completion_status'),
        ]);
        Session::flash('message', 'Data added successfully !');
        return redirect('/me/educational-information');

    }

    public function show()
    {
        $user = Auth::user();
        $diplomaInformation = Diploma::where('user_id', $user->id)->get()->first();
        if ($diplomaInformation) {
            // If data is present then show data
            return view('student.diploma-form', compact('user', 'diplomaInformation'));
        } else {
            // If no data is present then show form
            return view('student.diploma-form', compact('user', 'diplomaInformation'));
        }
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $diplomaInformation = Diploma::where('user_id', $user->id)->get()->first();
        $request->validate([
            'diploma_college' => 'required|min:5|max:20',
            'diploma_university' => 'required|min:5|max:20',
            'diploma_aggregates' => 'required|numeric|between:0,99.99',
            'out_of' => 'required|size:2|digits:2',
            'diploma_major' => 'required|min:5|max:20',
            'major_title' => 'required|min:4|max:20',
            'diploma_langauge' => 'required|min:3|max:20',
            'diploma_year_form' => 'required|size:4|digits:4',
            'diploma_year_to' => 'required|size:4|digits:4',
            'completion_status' => 'required',
        ]);
        $diplomaInformation->user_id = $user->id;
        $diplomaInformation->diploma_college = $request->get('diploma_college');
        $diplomaInformation->diploma_university = $request->get('diploma_university');
        $diplomaInformation->diploma_aggregates = $request->get('diploma_aggregates');
        $diplomaInformation->out_of = $request->get('out_of');
        $diplomaInformation->diploma_major = $request->get('diploma_major');
        $diplomaInformation->major_title = $request->get('major_title');
        $diplomaInformation->diploma_langauge = $request->get('diploma_langauge');
        $diplomaInformation->diploma_year_form = $request->get('diploma_year_form');
        $diplomaInformation->diploma_year_to = $request->get('diploma_year_to');
        $diplomaInformation->completion_status = $request->get('completion_status');
        $diplomaInformation->save();
        Session::flash('message', 'Data Updated successfully !');
        return redirect('/me/educational-information');

    }
}

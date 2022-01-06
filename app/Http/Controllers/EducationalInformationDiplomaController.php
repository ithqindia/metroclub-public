<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Diploma;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class EducationalInformationDiplomaController extends Controller
{
    public function store(Request $request, $id = null)
    {
        if (!$id) {
            $user = Auth::user();
        } else {
            $user = User::find($id);
        }

        $request->validate([
            'diploma_college' => 'required|min:5|max:254',
            'diploma_university' => 'required|min:5|max:254',
            'diploma_aggregates' => 'required|numeric|between:0,99.99',
            'out_of' => 'required',
            'diploma_major' => 'required|min:5|max:254',
            'major_title' => 'required|min:4|max:254',
            'diploma_langauge' => 'required|min:3|max:254',
            'diploma_year_form' => 'required|size:4|digits:4',
            'diploma_year_to' => 'required|size:4|digits:4',
            'completion_status' => 'required',
        ]);

        Diploma::create([
            'user_id' => $user->id,
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
        // return redirect('/me/educational-information');
        if (!$id) {
            return redirect('/me/educational-information');
        } else {
            return redirect('/students');
        }

    }

    public function show($id = null)
    {
        $viewWhenDataAvailable = 'diploma';
        $viewWhenDataNotAvailable = 'diploma-form';

        if (!$id) {
            $user = Auth::user();
            $viewWhenDataAvailable = 'student.diploma-form';
            $viewWhenDataNotAvailable = 'student.diploma-form';
        } else {
            $user = User::find($id);
        }

        $diplomaInformation = Diploma::where('user_id', $user->id)->get()->first();
        if ($diplomaInformation) {
            // If data is present then show data
            return view($viewWhenDataAvailable, compact('user', 'diplomaInformation'));
        } else {
            // If no data is present then show form
            $actionUrl = "/students/$id/diploma-form";
            return view($viewWhenDataNotAvailable, compact('user', 'actionUrl'));
        }
    }

    public function edit($id) {
        $actionUrl = "/students/$id/diploma-form";
        $diplomaInformation = Diploma::where('user_id', $id)->get()->first();
        $user = User::find($id);
        return view('diploma-form', compact('user', 'diplomaInformation', 'actionUrl'));
    }

    public function update(Request $request, $id = null)
    {
        if (!$id) {
            $user = Auth::user();
        } else {
            $user = User::find($id);
        }
        $diplomaInformation = Diploma::where('user_id', $user->id)->get()->first();
        $request->validate([
            'diploma_college' => 'required|min:5|max:254',
            'diploma_university' => 'required|min:5|max:254',
            'diploma_aggregates' => 'required|numeric|between:0,99.99',
            'out_of' => 'required',
            'diploma_major' => 'required|min:5|max:254',
            'major_title' => 'required|min:4|max:254',
            'diploma_langauge' => 'required|min:3|max:254',
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
        if (!$id) {
            return redirect('/me/educational-information');
        } else {
            return redirect('/students/' . $id);
        }
    }
}

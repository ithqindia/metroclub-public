<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Diploma;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class EducationalInformationDiplomaController extends Controller
{
    public function store(Request $request, $id)
    {
        $request->validate([
            'diploma_college' => 'required|min:5|max:20',
            'diploma_university' => 'required|min:5|max:20',
            'diploma_aggregates' => 'required|numeric|between:0,99.99',
            'diploma_major' => 'required|min:5|max:20',
            'diploma_langauge' => 'required|min:3|max:20',
            'diploma_year_form' => 'required|size:4|digits:4',
            'diploma_year_to' => 'required|size:4|digits:4',
        ]);

        Diploma::create([
            'user_id' => $id,
            'diploma_college' => $request->get('diploma_college'),
            'diploma_university' => $request->get('diploma_university'),
            'diploma_aggregates' => $request->get('diploma_aggregates'),
            'diploma_major' => $request->get('diploma_major'),
            'diploma_langauge' => $request->get('diploma_langauge'),
            'diploma_year_form' => $request->get('diploma_year_form'),
            'diploma_year_to' => $request->get('diploma_year_to'),
        ]);
        Session::flash('message', 'Data added successfully !');
        return redirect('/students');
    }

    public function show($id)
    {
        $diplomaInformation = Diploma::where('user_id', $id)->get()->first();
        $user = User::find($id);
        if ($diplomaInformation) {
            // If data is present then show data
            return view('diploma', compact('user', 'diplomaInformation'));
        } else {
            // If no data is present then show form
            $actionUrl = "/students/$id/diploma-form";
            return view('diploma-form', compact('user', 'actionUrl'));
        }
    }

    public function edit($id)
    {
        $actionUrl = "/students/$id/diploma-form";
        $diplomaInformation = Diploma::where('user_id', $id)->get()->first();
        $user = User::find($id);
        return view('diploma-form', compact('user', 'diplomaInformation', 'actionUrl'));
    }

    public function update(Request $request, $id)
    {
        $diplomaInformation = Diploma::where('user_id', $id)->get()->first();
        $request->validate([
            'diploma_college' => 'required|min:5|max:20',
            'diploma_university' => 'required|min:5|max:20',
            'diploma_aggregates' => 'required|numeric|between:0,99.99',
            'diploma_major' => 'required|min:5|max:20',
            'diploma_langauge' => 'required|min:3|max:20',
            'diploma_year_form' => 'required|size:4|digits:4',
            'diploma_year_to' => 'required|size:4|digits:4',
        ]);
        $diplomaInformation->user_id = $id;
        $diplomaInformation->diploma_college = $request->get('diploma_college');
        $diplomaInformation->diploma_university = $request->get('diploma_university');
        $diplomaInformation->diploma_aggregates = $request->get('diploma_aggregates');
        $diplomaInformation->diploma_major = $request->get('diploma_major');
        $diplomaInformation->diploma_langauge = $request->get('diploma_langauge');
        $diplomaInformation->diploma_year_form = $request->get('diploma_year_form');
        $diplomaInformation->diploma_year_to = $request->get('diploma_year_to');
        $diplomaInformation->save();
        Session::flash('message', 'Data Updated successfully !');
        return redirect('/students/' . $id);
    }
}

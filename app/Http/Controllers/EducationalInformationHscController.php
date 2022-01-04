<?php

namespace App\Http\Controllers;

use App\Models\Hsc;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class EducationalInformationHscController extends Controller
{
    public function store(Request $request, $id)
    {
        $request->validate([
            'hsc_college' => 'required|min:5|max:20',
            'hsc_board' => 'required|min:5|max:20',
            'hsc_percentage' => 'required|numeric|between:0,99.99',
            'hsc_major' => 'required|min:5|max:20',
            'hsc_langauge' => 'required|min:3|max:20',
            'hsc_year_form' => 'required|size:4|digits:4',
            'hsc_year_to' => 'required|size:4|digits:4',
        ]);

        Hsc::create([
            'user_id' => $id,
            'hsc_college' => $request->get('hsc_college'),
            'hsc_board' => $request->get('hsc_board'),
            'hsc_percentage' => $request->get('hsc_percentage'),
            'hsc_major' => $request->get('hsc_major'),
            'hsc_langauge' => $request->get('hsc_langauge'),
            'hsc_year_form' => $request->get('hsc_year_form'),
            'hsc_year_to' => $request->get('hsc_year_to'),
        ]);
        Session::flash('message', 'Data added successfully !');
        return redirect('/students');
    }

    public function show($id)
    {
        $hscInformation = Hsc::where('user_id', $id)->get()->first();
        $user = User::find($id);
        if ($hscInformation) {
            // If data is present then show data
            return view('hsc', compact('user', 'hscInformation'));
        } else {
            // If no data is present then show form
            $actionUrl = "/students/$id/hsc-form";
            return view('hsc-form', compact('user', 'actionUrl'));
        }
    }

    public function edit($id)
    {
        $actionUrl = "/students/$id/hsc-form";
        $hscInformation = Hsc::where('user_id', $id)->get()->first();
        $user = User::find($id);
        return view('hsc-form', compact('user', 'hscInformation', 'actionUrl'));
    }

    public function update(Request $request, $id)
    {
        $hscInformation = Hsc::where('user_id', $id)->get()->first();
        $request->validate([
            'hsc_college' => 'required|min:5|max:20',
            'hsc_board' => 'required|min:5|max:20',
            'hsc_percentage' => 'required|numeric|between:0,99.99',
            'hsc_major' => 'required|min:5|max:20',
            'hsc_langauge' => 'required|min:3|max:20',
            'hsc_year_form' => 'required|size:4|digits:4',
            'hsc_year_to' => 'required|size:4|digits:4',
        ]);

        $hscInformation->user_id = $id;
        $hscInformation->hsc_college = $request->get('hsc_college');
        $hscInformation->hsc_board = $request->get('hsc_board');
        $hscInformation->hsc_percentage = $request->get('hsc_percentage');
        $hscInformation->hsc_major = $request->get('hsc_major');
        $hscInformation->hsc_langauge = $request->get('hsc_langauge');
        $hscInformation->hsc_year_form = $request->get('hsc_year_form');
        $hscInformation->hsc_year_to = $request->get('hsc_year_to');
        $hscInformation->save();
        Session::flash('message', 'Data Updated successfully !');
        return redirect('/students/' . $id);
    }
}
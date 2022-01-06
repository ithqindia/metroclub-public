<?php

namespace App\Http\Controllers;

use App\Models\Ssc;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class EducationalInformationSscController extends Controller
{
    public function store(Request $request, $id = null)
    {
        if (!$id) {
            $user = Auth::user();
        }
        $request->validate([
            'ssc_school' => 'required|min:5|max:254',
            'ssc_board' => 'required|min:5|max:254',
            'ssc_percentage' => 'required|size:2|digits:2',
            // 'out_of' => 'required',
            'ssc_major' => 'required|min:5|max:254',
            'ssc_langauge' => 'required|min:5|max:254',
            'school_year_form' => 'required|size:4|digits:4',
            'school_year_to' => 'required|size:4|digits:4',
        ]);

        Ssc::create([
            'user_id' => $user->id,
            'ssc_school' => $request->get('ssc_school'),
            'ssc_board' => $request->get('ssc_board'),
            'ssc_percentage' => $request->get('ssc_percentage'),
            // 'out_of' => $request->get('out_of'),
            'ssc_major' => $request->get('ssc_major'),
            'ssc_langauge' => $request->get('ssc_langauge'),
            'school_year_form' => $request->get('school_year_form'),
            'school_year_to' => $request->get('school_year_to'),
        ]);

        Session::flash('message', 'Data added successfully !');
        if (!$id) {
            return redirect('/students');
        } else {
            return redirect('/me/educational-information');
        }
    }

    public function show($id = null)
    {
        $viewWhenDataAvailable = 'ssc';
        $viewWhenDataNotAvailable = 'education-form';

        if (!$id) {
            $user = Auth::user();
            $viewWhenDataAvailable = 'student.education-form';
            $viewWhenDataNotAvailable = 'student.education-form';
        } else {
            $user = User::find($id);
        }

        $sscInformation = Ssc::where('user_id', $user->id)->get()->first();
        if ($sscInformation) {
            return view($viewWhenDataAvailable, compact('user', 'sscInformation'));
        } else {
            return view($viewWhenDataNotAvailable, compact('user'));
        }
    }

    public function edit($id)
    {
        $actionUrl = "/students/$id/education-form";
        $sscInformation = Ssc::where('user_id', $id)->get()->first();
        $user = User::find($id);
        return view('education-form', compact('user', 'sscInformation', 'actionUrl'));
    }

    public function update(Request $request, $id = null)
    {
        if (!$id) {
            $user = Auth::user();
        }
        $sscInformation = Ssc::where('user_id', $user->id)->get()->first();

        $request->validate([
            'ssc_school' => 'required|min:5|max:254',
            'ssc_board' => 'required|min:5|max:254',
            'ssc_percentage' => 'required|size:2|digits:2',
            // 'out_of' => 'required',
            'ssc_major' => 'required|min:5|max:254',
            'ssc_langauge' => 'required|min:5|max:254',
            'school_year_form' => 'required|size:4|digits:4',
            'school_year_to' => 'required|size:4|digits:4',
        ]);

        $sscInformation->user_id = $user->id;
        $sscInformation->ssc_school = $request->get('ssc_school');
        $sscInformation->ssc_board = $request->get('ssc_board');
        $sscInformation->ssc_percentage = $request->get('ssc_percentage');
        // $sscInformation->out_of = $request->get('out_of');
        $sscInformation->ssc_major = $request->get('ssc_major');
        $sscInformation->ssc_langauge = $request->get('ssc_langauge');
        $sscInformation->school_year_form = $request->get('school_year_form');
        $sscInformation->school_year_to = $request->get('school_year_to');
        $sscInformation->save();
        Session::flash('message', 'Data Updated successfully !');

        if (!$id) {
            return redirect('/me/educational-information');
        } else {
            return redirect('/students/' . $id);
        }
    }
}

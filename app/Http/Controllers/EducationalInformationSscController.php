<?php

namespace App\Http\Controllers;

use App\Models\Ssc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class EducationalInformationSscController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'ssc_school' => 'required|min:5|max:254',
            'ssc_board' => 'required|min:5|max:254',
            'ssc_percentage' => 'required|size:2|digits:2',
            'out_of' => 'required',
            'ssc_major' => 'required|min:5|max:254',
            'ssc_langauge' => 'required|min:5|max:254',
            'school_year_form' => 'required|size:4|digits:4',
            'school_year_to' => 'required|size:4|digits:4',
        ]);

        Ssc::create([
            'user_id' => Auth::user()->id,
            'ssc_school' => $request->get('ssc_school'),
            'ssc_board' => $request->get('ssc_board'),
            'ssc_percentage' => $request->get('ssc_percentage'),
            'out_of' => $request->get('out_of'),
            'ssc_major' => $request->get('ssc_major'),
            'ssc_langauge' => $request->get('ssc_langauge'),
            'school_year_form' => $request->get('school_year_form'),
            'school_year_to' => $request->get('school_year_to'),
        ]);
        Session::flash('message', 'Data added successfully !');
        return redirect('/me/ssc');
    }

    public function show()
    {
        $user = Auth::user();
        $sscInformation = Ssc::where('user_id', $user->id)->get()->first();
        if ($sscInformation) {
            // If data is present then show form with data
            return view('student.education-form', compact('user', 'sscInformation'));
        } else {
            // If no data is present then show empty form
            return view('student.education-form', compact('user'));
        }
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $sscInformation = Ssc::where('user_id', $user->id)->get()->first();

        $request->validate([
            'ssc_school' => 'required|min:5|max:254',
            'ssc_board' => 'required|min:5|max:254',
            'ssc_percentage' => 'required|size:2|digits:2',
            'out_of' => 'required',
            'ssc_major' => 'required|min:5|max:254',
            'ssc_langauge' => 'required|min:5|max:254',
            'school_year_form' => 'required|size:4|digits:4',
            'school_year_to' => 'required|size:4|digits:4',
        ]);

        $sscInformation->user_id = $user->id;
        $sscInformation->ssc_school = $request->get('ssc_school');
        $sscInformation->ssc_board = $request->get('ssc_board');
        $sscInformation->ssc_percentage = $request->get('ssc_percentage');
        $sscInformation->out_of = $request->get('out_of');
        $sscInformation->ssc_major = $request->get('ssc_major');
        $sscInformation->ssc_langauge = $request->get('ssc_langauge');
        $sscInformation->school_year_form = $request->get('school_year_form');
        $sscInformation->school_year_to = $request->get('school_year_to');
        $sscInformation->save();
        Session::flash('message', 'Data Updated successfully !');
        return redirect('/me/educational-information');
    }
}

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
    public function store(Request $request, $id = null)
    {
        if (!$id) {
            $user = Auth::user();
        } else {
            $user = User::find($id);
        }
        $request->validate([
            'graduation_college' => 'required|min:5|max:254',
            'graduation_university' => 'required|min:5|max:254',
            'graduation_aggregates' => 'required|numeric|between:0,99.99',
            'out_of' => 'required',
            'graduation_major' => 'required|min:5|max:254',
            'major_title' => 'required|min:4|max:254',
            'graduation_langauge' => 'required|min:3|max:254',
            'graduation_year_from' => 'required|size:4|digits:4',
            'graduation_year_to' => 'required|size:4|digits:4',
            'completion_status' => 'required',
        ]);

        Graduation::create([
            'user_id' => $user->id,
            'graduation_college' => $request->get('graduation_college'),
            'graduation_university' => $request->get('graduation_university'),
            'graduation_aggregates' => $request->get('graduation_aggregates'),
            'out_of' => $request->get('out_of'),
            'graduation_major' => $request->get('graduation_major'),
            'major_title' => $request->get('major_title'),
            'graduation_langauge' => $request->get('graduation_langauge'),
            'graduation_year_from' => $request->get('graduation_year_from'),
            'graduation_year_to' => $request->get('graduation_year_to'),
            'completion_status' => $request->get('completion_status'),
        ]);
        Session::flash('message', 'Data added successfully !');
        if (!$id) {
            return redirect('/me/educational-information');
        } else {
            return redirect('/students');
        }
    }

    public function show($id = null)
    {
        $viewWhenDataAvailable = 'graduation';
        $viewWhenDataNotAvailable = 'graduation-form';

        if (!$id) {
            $user = Auth::user();
            $viewWhenDataAvailable = 'student.graduation-form';
            $viewWhenDataNotAvailable = 'student.graduation-form';
        } else {
            $user = User::find($id);
        }
        $graduationInformation = Graduation::where('user_id', $user->id)->get()->first();
        if ($graduationInformation) {
            // If data is present then show data
            return view($viewWhenDataAvailable, compact('user', 'graduationInformation'));
        } else {
            // If no data is present then show form
            $actionUrl = "/students/$id/graduation-form";
            return view($viewWhenDataNotAvailable, compact('user', 'actionUrl'));
        }
    }

    public function edit($id) {
        $actionUrl = "/students/$id/graduation-form";
        $graduationInformation = Graduation::where('user_id', $id)->get()->first();
        $user = User::find($id);
        return view('graduation-form', compact('user', 'graduationInformation', 'actionUrl'));
    }

    public function update(Request $request, $id = null)
    {
        if (!$id) {
            $user = Auth::user();
        } else {
            $user = User::find($id);
        }
        $graduationInformation = Graduation::where('user_id', $user->id)->get()->first();
        $request->validate([
            'graduation_college' => 'required|min:5|max:254',
            'graduation_university' => 'required|min:5|max:254',
            'graduation_aggregates' => 'required|numeric|between:0,99.99',
            'out_of' => 'required',
            'graduation_major' => 'required|min:5|max:254',
            'major_title' => 'required|min:4|max:254',
            'graduation_langauge' => 'required|min:3|max:254',
            'graduation_year_from' => 'required|size:4|digits:4',
            'graduation_year_to' => 'required|size:4|digits:4',
            'completion_status' => 'required',
        ]);

        $graduationInformation->user_id = $user->id;
        $graduationInformation->graduation_college = $request->get('graduation_college');
        $graduationInformation->graduation_university = $request->get('graduation_university');
        $graduationInformation->graduation_aggregates = $request->get('graduation_aggregates');
        $graduationInformation->out_of = $request->get('out_of');
        $graduationInformation->graduation_major = $request->get('graduation_major');
        $graduationInformation->major_title = $request->get('major_title');
        $graduationInformation->graduation_langauge = $request->get('graduation_langauge');
        $graduationInformation->graduation_year_from = $request->get('graduation_year_from');
        $graduationInformation->graduation_year_to = $request->get('graduation_year_to');
        $graduationInformation->completion_status = $request->get('completion_status');
        $graduationInformation->save();
        Session::flash('message', 'Data Updated successfully !');
        if (!$id) {
            return redirect('/me/educational-information');
        } else {
            return redirect('/students/' . $id);
        }
    }
}

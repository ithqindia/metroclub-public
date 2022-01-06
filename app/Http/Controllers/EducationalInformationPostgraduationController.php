<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Diploma;
use Illuminate\Http\Request;
use App\Models\PostGraduation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class EducationalInformationPostgraduationController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'post_graduation_college' => 'required|min:5|max:254',
            'post_graduation_university' => 'required|min:5|max:254',
            'post_graduation_aggregates' => 'required|numeric|between:0,99.99',
            'out_of' => 'required',
            'post_graduation_major' => 'required|min:5|max:254',
            'major_title' => 'required|min:4|max:254',
            'post_graduation_langauge' => 'required|min:3|max:254',
            'post_graduation_year_from' => 'required|size:4|digits:4',
            'post_graduation_year_to' => 'required|size:4|digits:4',
            'completion_status' => 'required',
        ]);

        PostGraduation::create([
            'user_id' => Auth::user()->id,
            'post_graduation_college' => $request->get('post_graduation_college'),
            'post_graduation_university' => $request->get('post_graduation_university'),
            'post_graduation_aggregates' => $request->get('post_graduation_aggregates'),
            'out_of' => $request->get('out_of'),
            'post_graduation_major' => $request->get('post_graduation_major'),
            'major_title' => $request->get('major_title'),
            'post_graduation_langauge' => $request->get('post_graduation_langauge'),
            'post_graduation_year_from' => $request->get('post_graduation_year_from'),
            'post_graduation_year_to' => $request->get('post_graduation_year_to'),
            'completion_status' => $request->get('completion_status'),
        ]);
        Session::flash('message', 'Data added successfully !');
        return redirect('/me/educational-information');
    }

    public function show()
    {
        $user = Auth::user();
        $postGraduationInformation = PostGraduation::where('user_id', $user->id)->get()->first();
        if ($postGraduationInformation) {
            // If data is present then show data
            return view('student.post-graduation-form', compact('user', 'postGraduationInformation'));
        } else {
            // If no data is present then show form
            return view('student.post-graduation-form', compact('user', 'postGraduationInformation'));
        }
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $postGraduationInformation = PostGraduation::where('user_id', $user->id)->get()->first();
        $request->validate([
            'post_graduation_college' => 'required|min:5|max:254',
            'post_graduation_university' => 'required|min:5|max:254',
            'post_graduation_aggregates' => 'required|numeric|between:0,99.99',
            'out_of' => 'required',
            'post_graduation_major' => 'required|min:5|max:254',
            'major_title' => 'required|min:4|max:254',
            'post_graduation_langauge' => 'required|min:3|max:254',
            'post_graduation_year_from' => 'required|size:4|digits:4',
            'post_graduation_year_to' => 'required|size:4|digits:4',
            'completion_status' => 'required',
        ]);

        $postGraduationInformation->user_id = $user->id;
        $postGraduationInformation->post_graduation_college = $request->get('post_graduation_college');
        $postGraduationInformation->post_graduation_university = $request->get('post_graduation_university');
        $postGraduationInformation->post_graduation_aggregates = $request->get('post_graduation_aggregates');
        $postGraduationInformation->out_of = $request->get('out_of');
        $postGraduationInformation->post_graduation_major = $request->get('post_graduation_major');
        $postGraduationInformation->major_title = $request->get('major_title');
        $postGraduationInformation->post_graduation_langauge = $request->get('post_graduation_langauge');
        $postGraduationInformation->post_graduation_year_from = $request->get('post_graduation_year_from');
        $postGraduationInformation->post_graduation_year_to = $request->get('post_graduation_year_to');
        $postGraduationInformation->completion_status = $request->get('completion_status');
        $postGraduationInformation->save();
        Session::flash('message', 'Data Updated successfully !');
        return redirect('/me/educational-information');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\PostGraduation;
use Illuminate\Support\Facades\Session;

class EducationalInformationPostgraduationController extends Controller
{
    public function store(Request $request, $id)
    {
        $request->validate([
            'post_graduation_college' => 'required|min:5|max:20',
            'post_graduation_university' => 'required|min:5|max:20',
            'post_graduation_aggregates' => 'required|numeric|between:0,99.99',
            'post_graduation_major' => 'required|min:5|max:20',
            'post_graduation_langauge' => 'required|min:3|max:20',
            'post_graduation_year_from' => 'required|size:4|digits:4',
            'post_graduation_year_to' => 'required|size:4|digits:4',
        ]);

        PostGraduation::create([
            'user_id' => $id,
            'post_graduation_college' => $request->get('post_graduation_college'),
            'post_graduation_university' => $request->get('post_graduation_university'),
            'post_graduation_aggregates' => $request->get('post_graduation_aggregates'),
            'post_graduation_major' => $request->get('post_graduation_major'),
            'post_graduation_langauge' => $request->get('post_graduation_langauge'),
            'post_graduation_year_from' => $request->get('post_graduation_year_from'),
            'post_graduation_year_to' => $request->get('post_graduation_year_to'),
        ]);
        Session::flash('message', 'Data added successfully !');
        return redirect('/students');
    }

    public function show($id)
    {
        $postGraduationInformation = PostGraduation::where('user_id', $id)->get()->first();
        $user = User::find($id);
        if ($postGraduationInformation) {
            // If data is present then show data
            return view('postgraduation', compact('user', 'postGraduationInformation'));
        } else {
            // If no data is present then show form
            $actionUrl = "/students/$id/post-graduation-form";
            return view('post-graduation-form', compact('user', 'actionUrl'));
        }
    }

    public function edit($id)
    {
        $actionUrl = "/students/$id/post-graduation-form";
        $postGraduationInformation = PostGraduation::where('user_id', $id)->get()->first();
        $user = User::find($id);
        return view('post-graduation-form', compact('user', 'postGraduationInformation', 'actionUrl'));
    }

    public function update(Request $request, $id)
    {
        $postGraduationInformation = PostGraduation::where('user_id', $id)->get()->first();
        $request->validate([
            'post_graduation_college' => 'required|min:5|max:20',
            'post_graduation_university' => 'required|min:5|max:20',
            'post_graduation_aggregates' => 'required|numeric|between:0,99.99',
            'post_graduation_major' => 'required|min:5|max:20',
            'post_graduation_langauge' => 'required|min:3|max:20',
            'post_graduation_year_from' => 'required|size:4|digits:4',
            'post_graduation_year_to' => 'required|size:4|digits:4',
        ]);

        $postGraduationInformation->user_id = $id;
        $postGraduationInformation->post_graduation_college = $request->get('post_graduation_college');
        $postGraduationInformation->post_graduation_university = $request->get('post_graduation_university');
        $postGraduationInformation->post_graduation_aggregates = $request->get('post_graduation_aggregates');
        $postGraduationInformation->post_graduation_major = $request->get('post_graduation_major');
        $postGraduationInformation->post_graduation_langauge = $request->get('post_graduation_langauge');
        $postGraduationInformation->post_graduation_year_from = $request->get('post_graduation_year_from');
        $postGraduationInformation->post_graduation_year_to = $request->get('post_graduation_year_to');
        $postGraduationInformation->save();
        Session::flash('message', 'Data Updated successfully !');
        return redirect('/students/' . $id);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\CourseMajor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class CourseMajorController extends Controller
{
    public function index()
    {
        $courseMajors = CourseMajor::paginate(20);
        return view('course-majors', compact('courseMajors'));
    }

    public function create()
    {
        $actionUrl = '/course-majors';
        return view('course-major-form', compact('actionUrl'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        CourseMajor::create([
            'name' => $request->get('name'),
            'details' => $request->get('details'),
            'is_enabled' => (bool)$request->get('is_enabled'),
        ]);
        Session::flash('message', 'Data added successfully !');
        return redirect('/course-majors');
    }

    public function edit($id)
    {
        $courseMajor = CourseMajor::find($id);
        $actionUrl = '/course-majors/' . $id;
        return view('course-major-form', compact('courseMajor', 'actionUrl'));
    }

    public function show($id)
    {
        $courseMajor = CourseMajor::with(['courses'])->find($id);
        return view('course-major', compact('courseMajor'));
    }

    public function update(Request $request, $id)
    {
        $courseMajor = CourseMajor::find($id);
        $request->validate([
            'name' => 'required',
        ]);
        $courseMajor->name = $request->get('name');
        $courseMajor->details = $request->get('details');
        $courseMajor->is_enabled = (bool)$request->get('is_enabled');
        $courseMajor->save();
        Session::flash('message', 'Data updated successfully !');
        return redirect('/course-majors');
    }

    public function destroy($id)
    {
        CourseMajor::find($id)->delete();
        Session::flash('message', 'Data delete successfully !');
        return redirect('/course-majors');
    }
}

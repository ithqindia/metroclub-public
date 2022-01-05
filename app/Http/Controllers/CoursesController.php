<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\University;
use App\Models\CourseMajor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Routing\Controller;

class CoursesController extends Controller
{
    public function index()
    {
        $courses = Course::paginate(20);
        $universities = University::get()->sortBy('name');
        $courseMajors = CourseMajor::get()->sortBy('name');
        return view('courses', compact('courses', 'universities', 'courseMajors'));
    }

    public function create()
    {
        $universities = University::get()->sortBy('name');
        $courseMajors = CourseMajor::get()->sortBy('name');
        $actionUrl = '/courses';
        return view('courses-form', compact('actionUrl', 'universities', 'courseMajors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:5',
        ]);

        Course::create([
            'name' => $request->get('name'),
            'details' => $request->get('details'),
            'university_id' => $request->get('university_id'),
            'course_major_id' => $request->get('course_major_id'),
            'is_enabled' => (bool)$request->get('is_enabled'),
        ]);

        Session::flash('message', 'Data added successfully !');
        return redirect('/courses');
    }

    public function show($id)
    {
        $course = Course::with(['university', 'courseMajor'])->find($id);
        $universities = University::get();
        $courseMajors = CourseMajor::get();
        return view('course', compact('course', 'universities', 'courseMajors'));
    }

    public function edit($id)
    {
        $universities = University::get()->sortBy('name');
        $courseMajors = CourseMajor::get()->sortBy('name');
        $course = Course::find($id);
        $actionUrl = '/courses/' . $id;
        return view('courses-form', compact('course', 'actionUrl', 'universities', 'courseMajors'));
    }

    public function update(Request $request, $id)
    {
        $course = Course::find($id);
        $request->validate([
            'name' => 'required|min:5',
        ]);

        $course->name = $request->name;
        $course->details = $request->details;
        $course->university_id = $request->university_id;
        $course->course_major_id = $request->course_major_id;
        $course->is_enabled = (bool)$request->is_enabled;
        $course->save();
        Session::flash('message', 'Data Updated successfully !');
        return redirect('/courses');
    }

    public function destroy($id)
    {
        Course::find($id)->delete();
        Session::flash('message', 'Data deleted successfully !');
        return redirect('/courses');
    }
}

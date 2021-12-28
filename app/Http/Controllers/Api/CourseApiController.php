<?php

namespace App\Http\Controllers\Api;

use App\Models\Course;
use App\Models\University;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Resources\CourseResource;

class CourseApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $country, $major)
    {
        $countryUniversities = University::where(
            ['country_id' => $country, 'is_enabled' => 1]
        )
            ->get()->pluck('id');
        $courses = Course::where([
            'is_enabled' => 1,
            'course_major_id' => $major
        ])
            ->whereIn('university_id', $countryUniversities)
            ->get()->sortBy('name');

        return CourseResource::collection($courses)->all();
    }

    public function show(Course $course)
    {
        $courseResource = new CourseResource(Course::find($course)->first());
        return $courseResource->toJson();
    }
}

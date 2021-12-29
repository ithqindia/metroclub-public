<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\University;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UniversityResource;

class UniversityController extends Controller
{
    public function index(Request $request, $country, $major, $tags)
    {
        // Get all universities for $country
        $countryUniversities = University::where(
            ['country_id' => $country, 'is_enabled' => 1]
        )->get()->pluck('id');

        $tagIds = explode("|", $tags);

        // Get all courses id where $course where $major
        $courses = Course::where([
            'is_enabled' => 1,
            'course_major_id' => $major
        ])
            ->whereIn('university_id', $countryUniversities)
            ->whereHas('tags', function ($q) use ($tagIds) {
                $q->whereIn('tag_id', $tagIds);
            })
            ->get()
            ->sortBy('name');

        $universities = University::whereIn('id', $courses->pluck('university_id'))
            ->with('courses', 'country')->get();
        return UniversityResource::collection($universities)->all();
    }

    public function show(University $university)
    {
        //
    }
}

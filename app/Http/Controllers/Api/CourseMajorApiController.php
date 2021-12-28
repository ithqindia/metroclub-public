<?php

namespace App\Http\Controllers\Api;

use App\Models\CourseMajor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CourseMajorResource;

class CourseMajorApiController extends Controller
{
    public function index()
    {
        $countries = CourseMajor::where('is_enabled', 1)->get()->sortBy('name');
        return CourseMajorResource::collection($countries)->toJson();
    }

    public function show(CourseMajor $courseMajor)
    {
        $courseMajorResource = new CourseMajorResource(CourseMajor::find($courseMajor)->first());
        return $courseMajorResource->toJson();
    }
}

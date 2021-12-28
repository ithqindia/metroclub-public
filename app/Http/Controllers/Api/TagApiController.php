<?php

namespace App\Http\Controllers\Api;

use App\Models\Tag;
use App\Models\Course;
use App\Models\University;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CourseResource;

class TagApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tags = Tag::select('id', 'name')->get();
        return $tags->toJson();
    }
}

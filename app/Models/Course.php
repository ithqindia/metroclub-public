<?php

namespace App\Models;

use App\Models\Tag;
use App\Models\University;
use App\Models\CourseMajor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function university()
    {
        return $this->belongsTo(University::class);
    }

    public function courseMajor()
    {
        return $this->belongsTo(CourseMajor::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function course_information()
    {
        return $this->belongsTo(Course::class);
    }
}

<?php

namespace App\Models;

use App\Models\Course;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CourseMajor extends Model
{
    use HasFactory;
    use Concerns\UsesUuid;

    protected $guarded = [];

    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}

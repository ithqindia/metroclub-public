<?php

namespace App\Models;

use App\Models\University;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Country extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function universities()
    {
        return $this->hasMany(University::class);
    }

    //      public function courses()
    //      {
    //          return $this->hasManyThrough(University::class, Course::class);
    //      }
}

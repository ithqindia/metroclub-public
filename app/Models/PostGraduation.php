<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostGraduation extends Model
{
    use HasFactory;
    protected $table = "post_graduations";
    protected $guarded = [];
}

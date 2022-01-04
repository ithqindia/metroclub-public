<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CounselorSession extends Model
{
    use HasFactory;
    protected $table = "counselor_sessions";
    protected $guarded = [];
}

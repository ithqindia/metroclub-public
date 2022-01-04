<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ExtraScore extends Model
{
    use HasFactory;
    protected $table = "extra_scores";
    protected $guarded = [];
}

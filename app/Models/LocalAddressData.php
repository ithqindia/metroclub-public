<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocalAddressData extends Model
{
    use HasFactory;
    protected $table = "local_address_details";
    protected $guarded = [];
}

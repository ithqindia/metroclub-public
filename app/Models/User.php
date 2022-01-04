<?php

namespace App\Models;

use App\Models\Hsc;
use App\Models\Ssc;
use App\Models\Selfie;
use App\Models\Diploma;
use App\Models\ExtraScore;
use App\Models\Graduation;
use App\Models\RefereeDetail;
use App\Models\EmployeeDetail;
use App\Models\PostGraduation;
use App\Models\EmployeeAddress;
use App\Models\UserInformation;
use App\Models\PersonalInformation;
use App\Models\CounselorSession;
use App\Models\LocalAddressData;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function user_information()
    {
        return $this->hasOne(UserInformation::class);
    }

    public function referee_data()
    {
        return $this->hasOne(RefereeDetail::class);
    }

    public function employee_data()
    {
        return $this->hasOne(EmployeeDetail::class);
    }

    public function local_address_data()
    {
        return $this->hasOne(LocalAddressData::class);
    }

    public function employee_address_data()
    {
        return $this->hasOne(EmployeeAddress::class);
    }

    public function basic_information()
    {
        return $this->hasOne(PersonalInformation::class);
    }

    public function ssc_information()
    {
        return $this->hasOne(Ssc::class);
    }

    public function Hsc_information()
    {
        return $this->hasOne(Hsc::class);
    }

    public function graduation_information()
    {
        return $this->hasOne(Graduation::class);
    }

    public function diploma_information()
    {
        return $this->hasOne(Diploma::class);
    }

    public function post_graduation_information()
    {
        return $this->hasOne(PostGraduation::class);
    }

    public function counselorsession_information()
    {
        return $this->hasOne(CounselorSession::class);
    }

    public function extrascore_information()
    {
        return $this->hasOne(ExtraScore::class);
    }

    public function selfie_information()
    {
        return $this->hasOne(Selfie::class);
    }

}

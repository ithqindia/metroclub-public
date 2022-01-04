<?php

namespace App\Http\Controllers;

use App\Models\Hsc;
use App\Models\Ssc;
use App\Models\User;
use App\Models\Selfie;
use App\Models\Diploma;
use App\Models\ExtraScore;
use App\Models\Graduation;
use App\Models\RefereeDetail;
use App\Models\EmployeeDetail;
use App\Models\PostGraduation;
use App\Models\EmployeeAddress;
use App\Models\PersonalInformation;
use App\Models\CounselorSession;
use App\Models\LocalAddressData;
use App\Http\Controllers\Controller;

class StudentController extends Controller
{
    public function index()
    {
        $students = User::get();
        return view('students', compact('students'));
    }

    public function show($id)
    {
        $student = User::find($id);
        $counselorSessionInformation = CounselorSession::where('user_id', $id)->get()->first();
        $extraScoreInformation = ExtraScore::where('user_id', $id)->get()->first();
        $selfieInformation = Selfie::where('user_id', $id)->get()->first();

        $personalInformation = PersonalInformation::where('user_id', $id)->get()->first();

        $referee = RefereeDetail::where('user_id', $id)->get()->first();
        $employee = EmployeeDetail::where('user_id', $id)->get()->first();
        $localAddress = LocalAddressData::where('user_id', $id)->get()->first();
        $permanentAddress = EmployeeAddress::where('user_id', $id)->get()->first();

        $ssc = Ssc::where('user_id', $id)->get()->first();
        $hsc = Hsc::where('user_id', $id)->get()->first();
        $graduation = Graduation::where('user_id', $id)->get()->first();
        $diploma = Diploma::where('user_id', $id)->get()->first();
        $postGraduation = PostGraduation::where('user_id', $id)->get()->first();

        return view('student', compact('student', 'personalInformation', 'counselorSessionInformation', 'extraScoreInformation', 'selfieInformation', 'referee', 'employee', 'localAddress', 'permanentAddress', 'ssc', 'hsc', 'graduation', 'diploma', 'postGraduation'));
    }
}

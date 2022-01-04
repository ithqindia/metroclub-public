<?php

namespace App\Http\Controllers;

use App\Models\RefereeDetail;
use App\Models\EmployeeDetail;
use App\Models\Hsc;
use App\Models\Ssc;
use App\Models\Diploma;
use App\Models\Graduation;
use App\Models\PostGraduation;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function index($route)
    {
        $user = Auth::user();
        switch ($route) {
            case 'dashboard':
                $info = [1];
                return view('student.dashboard', compact('info', 'user'));
            case 'wished':
                $info = [1];
                return view('student.wished', compact('info', 'user'));
            case 'personal-information':
                $info = [1];
                return view('student.personal-information', compact('info', 'user'));
            case 'educational-information':
                $info = [1];
                $ssc_information = Ssc::where('user_id', $user->id)->get()->first();
                $hsc_information = Hsc::where('user_id', $user->id)->get()->first();
                $graduation_information = Graduation::where('user_id', $user->id)->get()->first();
                $diploma_information = Diploma::where('user_id', $user->id)->get()->first();
                $postgraduation_information = PostGraduation::where('user_id', $user->id)->get()->first();
                return view('student.educational-information', compact('info', 'user'));
            case 'employment-information':
                $referee_data = RefereeDetail::where('user_id', $user->id)->get()->first();
                $employee_data = EmployeeDetail::where('user_id', $user->id)->get()->first();
                return view('student.employment-information', compact('referee_data', 'employee_data', 'user'));
            case 'counselor-session':
                $info = [1];
                return view('student.counselor-session', compact('info', 'user'));
            case 'settings':
                $info = [1];
                return view('student.settings', compact('info', 'user'));
        }
    }
}

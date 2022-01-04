<?php
namespace App\Http\Controllers;
use App\Models\Selfie;
use App\Models\LocalAddressData;
use App\Models\PersonalInformation;
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
                $basic_information = PersonalInformation::where('user_id', $user->id)->get()->first();
                $local_address_data = LocalAddressData::where('user_id', $user->id)->get()->first();
                $selfie_information = Selfie::where('user_id', $user->id)->get()->first();
                return view('student.personal-details', compact('basic_information','local_address_data','selfie_information','user'));
            case 'educational-information':
                $info = [1];
                return view('student.educational-information', compact('info', 'user'));
            case 'employment-information':
                $info = [1];
                return view('student.employment-information', compact('info', 'user'));
            case 'counselor-session':
                $info = [1];
                return view('student.counselor-session', compact('info', 'user'));
            case 'settings':
                $info = [1];
                return view('student.settings', compact('info', 'user'));
        }
    }
}

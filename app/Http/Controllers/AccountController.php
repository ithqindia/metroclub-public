<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function index($url)
    {
        $user = Auth::user();
        switch ($url) {
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

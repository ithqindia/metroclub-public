<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\PersonalInformation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PersonalInformationController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'salutation' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'mobile' => 'required|digits:10',
            'phone' => 'required|size:10|digits:10',
            'whatsapp_number' => 'required|size:10|digits:10',
            'skype' => 'required',
            'zoom' => 'required',
            'other' => 'required',
            'birth_date' => 'required',
            'passport_number' => 'required',
            'nationality' => 'required',
            'gender' => 'required',
            'relationship_status' => 'required',
        ]);

        PersonalInformation::create([
            'user_id' => Auth::user()->id,
            'salutation' => $request->get('salutation'),
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'email' => $request->get('email'),
            'mobile' => $request->get('mobile'),
            'phone' => $request->get('phone'),
            'whatsapp_number' => $request->get('whatsapp_number'),
            'skype' => $request->get('skype'),
            'zoom' => $request->get('zoom'),
            'other' => $request->get('other'),
            'birth_date' => $request->get('birth_date'),
            'passport_number' => $request->get('passport_number'),
            'nationality' => $request->get('nationality'),
            'gender' => $request->get('gender'),
            'relationship_status' => $request->get('relationship_status'),
        ]);
        Session::flash('message', 'Data inserted successfully !');
        return redirect('/me/personal-information');
    }

    public function show()
    {
        $user = Auth::user();
        $personalInformation = PersonalInformation::where('user_id', $user->id)->get()->first();
        //$user = User::find($id);
        if ($personalInformation) {
            // If data is present then show data
            return view('student.personal-information-form', compact('user', 'personalInformation'));
        } else {
            // If no data is present then show form
            //$actionUrl = "/students/$id/personal-information";
            return view('student.personal-information-form', compact('user'));
        }
    }

    // public function edit()
    // {
    //     $user = Auth::user();
    //     //$actionUrl = "/students/$id/personal-information";
    //     $personalInformation = PersonalInformation::where('user_id', $user->id)->get()->first();
    //     //$user = User::find($id);
    //     return view('student.personal-information-form', compact('user', 'personalInformation'));
    // }

    public function update(Request $request)
    {
        $user = Auth::user();
        $personalInformation = PersonalInformation::where('user_id', $user->id)->get()->first();
        $request->validate([
            'salutation' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'mobile' => 'required|digits:10',
            'phone' => 'required|size:10|digits:10',
            'whatsapp_number' => 'required|size:10|digits:10',
            'skype' => 'required',
            'zoom' => 'required',
            'other' => 'required',
            'birth_date' => 'required',
            'passport_number' => 'required',
            'nationality' => 'required',
            'gender' => 'required',
            'relationship_status' => 'required',
        ]);

        $personalInformation->user_id = $user->id;
        $personalInformation->salutation = $request->get('salutation');
        $personalInformation->first_name = $request->get('first_name');
        $personalInformation->last_name = $request->get('last_name');
        $personalInformation->email = $request->get('email');
        $personalInformation->mobile = $request->get('mobile');
        $personalInformation->phone = $request->get('phone');
        $personalInformation->whatsapp_number = $request->get('whatsapp_number');
        $personalInformation->skype = $request->get('skype');
        $personalInformation->zoom = $request->get('zoom');
        $personalInformation->other = $request->get('other');
        $personalInformation->birth_date = $request->get('birth_date');
        $personalInformation->passport_number = $request->get('passport_number');
        $personalInformation->nationality = $request->get('nationality');
        $personalInformation->gender = $request->get('gender');
        $personalInformation->relationship_status = $request->get('relationship_status');
        $personalInformation->save();
        Session::flash('message', 'Data updated successfully !');
        return redirect('/me/personal-information');
    }
}

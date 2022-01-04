<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\BasicInformation;
use Illuminate\Support\Facades\Session;

class PersonalInformationController extends Controller
{
    public function store(Request $request, $id)
    {
        $request->validate([
            'salutation' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'mobile' => 'required|digits:10',
            'phone' => 'required|size:10|digits:10',
            'whatsapp_number' => 'required|size:10|digits:10',
            'skype_id' => 'required',
            'zoom_id' => 'required',
            'other_id' => 'required',
            'birth_date' => 'required',
            'passport_number' => 'required',
            'nationality' => 'required',
            'gender' => 'required',
            'relationship_status' => 'required',
        ]);

        BasicInformation::create([
            'user_id' => $id,
            'salutation' => $request->get('salutation'),
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'email' => $request->get('email'),
            'mobile' => $request->get('mobile'),
            'phone' => $request->get('phone'),
            'whatsapp_number' => $request->get('whatsapp_number'),
            'skype_id' => $request->get('skype_id'),
            'zoom_id' => $request->get('zoom_id'),
            'other_id' => $request->get('other_id'),
            'birth_date' => $request->get('birth_date'),
            'passport_number' => $request->get('passport_number'),
            'nationality' => $request->get('nationality'),
            'gender' => $request->get('gender'),
            'relationship_status' => $request->get('relationship_status'),
        ]);
        Session::flash('message', 'Data inserted successfully !');
        return redirect('/students');
    }

    public function show($id)
    {
        $personalInformation = BasicInformation::where('user_id', $id)->get()->first();
        $user = User::find($id);
        if ($personalInformation) {
            // If data is present then show data
            return view('personal', compact('user', 'personalInformation'));
        } else {
            // If no data is present then show form
            $actionUrl = "/students/$id/personal-information";
            return view('personal-information-form', compact('user', 'actionUrl'));
        }
    }

    public function edit($id)
    {
        $actionUrl = "/students/$id/personal-information";
        $personalInformation = BasicInformation::where('user_id', $id)->get()->first();
        $user = User::find($id);
        return view('personal-information-form', compact('user', 'personalInformation', 'actionUrl'));
    }

    public function update(Request $request, $id)
    {
        $personalInformation = BasicInformation::where('user_id', $id)->get()->first();
        $request->validate([
            'salutation' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'mobile' => 'required|digits:10',
            'phone' => 'required|size:10|digits:10',
            'whatsapp_number' => 'required|size:10|digits:10',
            'skype_id' => 'required',
            'zoom_id' => 'required',
            'other_id' => 'required',
            'birth_date' => 'required',
            'passport_number' => 'required',
            'nationality' => 'required',
            'gender' => 'required',
            'relationship_status' => 'required',
        ]);

        $personalInformation->user_id = $id;
        $personalInformation->salutation = $request->get('salutation');
        $personalInformation->first_name = $request->get('first_name');
        $personalInformation->last_name = $request->get('last_name');
        $personalInformation->email = $request->get('email');
        $personalInformation->mobile = $request->get('mobile');
        $personalInformation->phone = $request->get('phone');
        $personalInformation->whatsapp_number = $request->get('whatsapp_number');
        $personalInformation->skype_id = $request->get('skype_id');
        $personalInformation->zoom_id = $request->get('zoom_id');
        $personalInformation->other_id = $request->get('other_id');
        $personalInformation->birth_date = $request->get('birth_date');
        $personalInformation->passport_number = $request->get('passport_number');
        $personalInformation->nationality = $request->get('nationality');
        $personalInformation->gender = $request->get('gender');
        $personalInformation->relationship_status = $request->get('relationship_status');
        $personalInformation->save();
        Session::flash('message', 'Data updated successfully !');
        return redirect('/students/' . $id);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserData;
use Illuminate\Http\Request;
use App\Models\UserInformation;

class TestData extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required|min:10|max:100',
        ]);

        UserInformation::create([
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
            'address' => $request->get('address'),
            'user_id' => $request->get('user_id'),
        ]);
        return view('success');
    }

    public function show(Request $request)
    {
        $userInformation = UserInformation::where('user_id', $request->id)->get()->first();
        $user = User::find($request->id);
        return view('test', compact('userInformation', 'user'));
    }

    public function update(Request $request)
    {
        $userInformation = UserInformation::find($request->user_information_id);
        $request->validate([
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required|min:10|max:100',
        ]);

        $userInformation->email = $request->get('email');
        $userInformation->address = $request->get('address');
        $userInformation->save();
        return view('success');
    }

    public function view(Request $request)
    {
        $user = User::with('user_information')->find($request->id);
        return view('user-info', compact('user'));
    }
}

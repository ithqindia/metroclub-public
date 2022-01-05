<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Selfie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SelfieController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'selfie' => 'required',
        ]);

        Selfie::create([
            'user_id' =>Auth::user()->id,
            'selfie' => $request->get('selfie'),
        ]);
        Session::flash('message', 'Data inserted successfully !');
        return redirect('/me/seflie');
    }

    public function show()
    {
        $user = Auth::user();
        $selfieInformation = Selfie::where('user_id', $user->id)->get()->first();
        //$user = User::find($id);
        if ($selfieInformation) {
            // If data is present then show data
            return view('student.selfie-form', compact('user', 'selfieInformation'));
        } else {
            // If no data is present then show form
            //$actionUrl = "/students/$id/selfie-form";
            return view('student.selfie-form', compact('user'));
        }
    }

    // public function edit()
    // {
    //     $user = Auth::user();
    //     //$actionUrl = "/students/$id/selfie-form";
    //     $selfieInformation = Selfie::where('user_id', $user->id)->get()->first();
    //     //$user = User::find($id);
    //     return view('student.selfie-form', compact('user', 'selfieInformation'));
    // }

    public function update(Request $request)
    {
        $user = Auth::user();
        $selfieInformation = Selfie::where('user_id', $user->id)->get()->first();
        $request->validate([
            'selfie' => 'required',
        ]);
        $selfieInformation->user_id = $user->id;
        $selfieInformation->selfie = $request->get('selfie');
        $selfieInformation->save();
        Session::flash('message', 'Data updated successfully !');
        return redirect('/me/personal-information');
    }
}

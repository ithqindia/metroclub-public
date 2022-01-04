<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Selfie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SelfieController extends Controller
{
    public function store(Request $request, $id)
    {
        $request->validate([
            'selfie' => 'required',
        ]);

        Selfie::create([
            'user_id' => $id,
            'selfie' => $request->get('selfie'),
        ]);
        Session::flash('message', 'Data inserted successfully !');
        return redirect('/students');
    }
    public function show($id)
    {
        $selfieInformation = Selfie::where('user_id', $id)->get()->first();
        $user = User::find($id);
        if ($selfieInformation) {
            // If data is present then show data
            return view('selfie', compact('user', 'selfieInformation'));
        } else {
            // If no data is present then show form
            $actionUrl = "/students/$id/selfie-form";
            return view('selfie-form', compact('user', 'actionUrl'));
        }
    }

    public function edit($id)
    {
        $actionUrl = "/students/$id/selfie-form";
        $selfieInformation = Selfie::where('user_id', $id)->get()->first();
        $user = User::find($id);
        return view('selfie-form', compact('user', 'selfieInformation', 'actionUrl'));
    }

    public function update(Request $request, $id)
    {
        $selfieInformation = Selfie::where('user_id', $id)->get()->first();
        $request->validate([
            'selfie' => 'required',
        ]);
        $selfieInformation->$id;
        $selfieInformation->selfie = $request->get('selfie');
        $selfieInformation->save();
        Session::flash('message', 'Data updated successfully !');
        return redirect('/students/' . $id);
    }
}

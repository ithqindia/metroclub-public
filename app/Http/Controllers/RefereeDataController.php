<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\RefereeDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class RefereeDataController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'organisation' => 'required',
            'position' => 'required',
            'email_address' => 'required|email',
        ]);
        RefereeDetail::create([
            'user_id' => Auth::user()->id,
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'organisation' => $request->get('organisation'),
            'position' => $request->get('position'),
            'email_address' => $request->get('email_address'),
        ]);
        Session::flash('message', 'Data inserted successfully !');
        return redirect('/me/referee');
    }

    public function show()
    {
        $user = Auth::user();
        $referee =   RefereeDetail::where('user_id', $user->id)->get()->first();
        if ($referee) {
            // If data is present then show data
            return view('student.referee-form', compact('user', 'referee'));
        } else {
            // If no data is present then show form

            return view('student.referee-form', compact('user', 'referee'));
        }
    }
    public function update(Request $request)
    {
        $user = Auth::user();
        $referee = RefereeDetail::where('user_id', $user->id)->get()->first();
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'organisation' => 'required',
            'position' => 'required',
            'email_address' => 'required|email',
        ]);

        $referee->user_id = $user->id;
        $referee->first_name = $request->get('first_name');
        $referee->last_name = $request->get('last_name');
        $referee->organisation = $request->get('organisation');
        $referee->position = $request->get('position');
        $referee->email_address = $request->get('email_address');
        $referee->save();
        Session::flash('message', 'Data updated successfully !');
        return redirect('/me/employment-information');
    }
}

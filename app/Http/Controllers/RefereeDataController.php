<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\RefereeDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class RefereeDataController extends Controller
{
    public function index(){
        $user = Auth::user();
        $referee =   RefereeDetail::where('user_id', $user->id)->get()->first();

            $actionUrl = "/me/referee-form";
            return view('student.referee-form', compact('user', 'actionUrl'));
    }
    public function store(Request $request, $id)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'organisation' => 'required',
            'position' => 'required',
            'email_address' => 'required|email',
        ]);
        RefereeDetail::create([
            'user_id' => $id,
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'organisation' => $request->get('organisation'),
            'position' => $request->get('position'),
            'email_address' => $request->get('email_address'),
        ]);
        Session::flash('message', 'Data inserted successfully !');
        return redirect('/students');
    }

    public function show($id)
    {
        $referee =   RefereeDetail::where('user_id', $id)->get()->first();
        $user = User::find($id);

        if ($referee) {
            // If data is present then show data
            return view('referee', compact('user', 'referee'));
        } else {
            // If no data is present then show form
            $actionUrl = "/students/$id/referee-form";
            return view('referee-form', compact('user', 'actionUrl'));
        }
    }
    public function edit($id)
    {
        $actionUrl = "/students/$id/referee-form";
        $referee =  RefereeDetail::where('user_id', $id)->get()->first();
        $user = User::find($id);
        return view('referee-form', compact('user', 'referee', 'actionUrl'));
    }

    public function update(Request $request, $id)
    {
        $referee = RefereeDetail::where('user_id', $id)->get()->first();
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'organisation' => 'required',
            'position' => 'required',
            'email_address' => 'required|email',
        ]);

        $referee->user_id = $id;
        $referee->first_name = $request->get('first_name');
        $referee->last_name = $request->get('last_name');
        $referee->organisation = $request->get('organisation');
        $referee->position = $request->get('position');
        $referee->email_address = $request->get('email_address');
        $referee->save();
        Session::flash('message', 'Data updated successfully !');
        return redirect('/students/' . $id);
    }
}

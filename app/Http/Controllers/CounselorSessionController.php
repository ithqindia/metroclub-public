<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\CounselorSession;
use Illuminate\Support\Facades\Session;

class CounselorSessionController extends Controller
{
    public function store(Request $request, $id)
    {
        $request->validate([
            'session_date' => 'required',
            'session_time' => 'required',
            'meeting_name' => 'required',
        ]);
        CounselorSession::create([
            'user_id' => $id,
            'session_date' => $request->get('session_date'),
            'session_time' => $request->get('session_time'),
            'meeting_name' => $request->get('meeting_name'),
        ]);
        Session::flash('message', 'Data inserted successfully !');
        return redirect('/students');
    }

    public function show($id)
    {
        $counselorSessionInformation = CounselorSession::where('user_id', $id)->get()->first();
        $user = User::find($id);
        if ($counselorSessionInformation) {
            // If data is present then show data
            return view('counselor-session', compact('user', 'counselorSessionInformation'));
        } else {
            // If no data is present then show form
            $actionUrl = "/students/$id/counselor-session-form";
            return view('counselor-session-form', compact('user', 'actionUrl'));
        }
    }

    public function edit($id)
    {
        $actionUrl = "/students/$id/counselor-session-form";
        $counselorSessionInformation = CounselorSession::where('user_id', $id)->get()->first();
        $user = User::find($id);
        return view('counselor-session-form', compact('user', 'counselorSessionInformation', 'actionUrl'));
    }

    public function update(Request $request, $id)
    {
        $counselorSessionInformation = CounselorSession::where('user_id', $id)->get()->first();
        $request->validate([
            'session_date' => 'required',
            'session_time' => 'required',
            'meeting_name' => 'required',
        ]);
        $counselorSessionInformation->$id;
        $counselorSessionInformation->session_date = $request->get('session_date');
        $counselorSessionInformation->session_time = $request->get('session_time');
        $counselorSessionInformation->meeting_name = $request->get('meeting_name');
        $counselorSessionInformation->save();
        Session::flash('message', 'Data updated successfully !');
        return redirect('/students/' . $id);
    }
}

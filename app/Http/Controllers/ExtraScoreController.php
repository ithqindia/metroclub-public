<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\ExtraScore;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class ExtraScoreController extends Controller
{
    public function store(Request $request, $id)
    {
        $request->validate([
            'exam_date' => 'required',
            'score' => 'required',
        ]);
        ExtraScore::create([
            'user_id' => $id,
            'exam_date' => $request->get('exam_date'),
            'score' => $request->get('score')
        ]);
        Session::flash('message', 'Data inserted successfully !');
        return redirect('/students');
    }

    public function show($id)
    {
        $extraScoreInformation = ExtraScore::where('user_id', $id)->get()->first();
        $user = User::find($id);
        if ($extraScoreInformation) {
            return view('extra-score', compact('user', 'extraScoreInformation'));
        } else {
            $actionUrl = "/students/$id/extra-score-form";
            return view('extra-score-form', compact('user', 'actionUrl'));
        }
    }

    public function edit($id)
    {
        $actionUrl = "/students/$id/extra-score-form";
        $extraScoreInformation = ExtraScore::where('user_id', $id)->get()->first();
        $user = User::find($id);
        return view('extra-score-form', compact('user', 'extraScoreInformation', 'actionUrl'));
    }

    public function update(Request $request, $id)
    {
        $extraScoreInformation = ExtraScore::where('user_id', $id)->get()->first();
        $request->validate([
            'exam_date' => 'required',
            'score' => 'required',
        ]);
        $extraScoreInformation->$id;
        $extraScoreInformation->exam_date = $request->get('exam_date');
        $extraScoreInformation->score = $request->get('score');
        $extraScoreInformation->save();
        Session::flash('message', 'Data updated successfully !');
        return redirect('/students/' . $id);
    }
}

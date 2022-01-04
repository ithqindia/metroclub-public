<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::get();
        return view('tags', compact('tags'));
    }

    public function create()
    {
        $actionUrl = '/tags';
        return view('tags-form', compact('actionUrl'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        Tag::create([
            'name' => $request->get('name'),
        ]);
        Session::flash('message', 'Data added successfully !');
        return redirect('/tags');
    }

    public function show($id)
    {
        $tag = Tag::find($id);
        return view('/tag', compact('tag'));
    }

    public function edit($id)
    {
        $tag = Tag::find($id);
        $actionUrl = '/tags/' . $id;
        return view('tags-form', compact('tag', 'actionUrl'));
    }

    public function update(Request $request, $id)
    {
        $tag = Tag::find($id);
        $request->validate([
            'name' => 'required',
        ]);
        $tag->name = $request->get('name');
        $tag->save();
        Session::flash('message', 'Data updated successfully !');
        return redirect('/tags');
    }

    public function destroy($id)
    {
        Tag::find($id)->delete();
        Session::flash('message', 'Data deleted successfully !');
        return redirect('/tags');
    }
}

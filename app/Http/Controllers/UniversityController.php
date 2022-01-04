<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\University;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class UniversityController extends Controller
{
    public function index()
    {
        $universities = University::paginate(20);
        return view('universities', compact('universities'));
    }

    public function create()
    {
        $actionUrl = '/universities';
        $countries = Country::get();
        return view('universities-form', compact('actionUrl', 'countries'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'city' => 'required',
            'country_id' => 'required',
        ]);

        $path = '';
        // Validate if file is uploaded
        if ($request->file('logo')->isValid()) {
            //$path = Storage::putFile('folderName_change_as_required', $request->file('logo'));
            $path = $request->file('logo')->store(University::$imageFolder);
        } else {
            // TODO later
        }

        University::create([
            'name' => $request->get('name'),
            'city' => $request->get('city'),
            'details' => $request->get('details'),
            //'logo' => $path,
            'logo' =>  '/storage/' . $path,
            'country_id' => $request->get('country_id'),
            'is_enabled' => (bool)$request->get('is_enabled'),
        ]);

        Session::flash('message', 'Data added successfully !');
        return redirect('/universities');
    }

    public function show($id)
    {
        $university = University::with(['country', 'courses'])->find($id);
        $countries = Country::get();
        return view('university', compact('university', 'countries'));
    }

    public function edit($id)
    {
        $university = University::find($id);
        $actionUrl = '/universities/' . $id;
        $countries = Country::get();
        return view('universities-form', compact('university', 'actionUrl', 'countries'));
    }

    public function update(Request $request, $id)
    {
        $university = University::find($id);
        $request->validate([
            'name' => 'required',
            'city' => 'required',
            'country_id' => 'required',
        ]);

        $university->name = $request->get('name');
        $university->city = $request->get('city');
        $university->details = $request->get('details');
        $university->logo = $request->get('logo');
        $university->country_id = $request->get('country_id');
        $university->is_enabled = (bool)$request->get('is_enabled');
        $university->save();
        Session::flash('message', 'Data updated successfully !');
        return redirect('/universities');
    }

    public function destroy($id)
    {
        University::find($id)->delete();
        Session::flash('message', 'Data deleted successfully !');
        return redirect('/universities');
    }
}

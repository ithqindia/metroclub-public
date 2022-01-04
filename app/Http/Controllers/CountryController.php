<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class CountryController extends Controller
{
    public function index()
    {
        $countries = Country::get();
        return view('countries', compact('countries'));
    }

    public function create()
    {
        $actionUrl = '/countries';
        return view('countries-form', compact('actionUrl'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $path = '';
        // Validate if file is uploaded
        if ($request->file('flag')->isValid()) {
            $path = Storage::putFile('folderName_change_as_required', $request->file('flag'));
        } else {
            // TODO later
        }

        Country::create([
            'name' => $request->get('name'),
            'flag' => $path,
            'details' => $request->get('details'),
            'is_enabled' => (bool) $request->get('is_enabled'),

        ]);
        Session::flash('message', 'Data added successfully !');
        return redirect('/countries');
    }

    public function show($id)
    {
        $country = Country::with('universities')->find($id);
        return view('/country', compact('country'));
    }

    public function edit($id)
    {
        $country = Country::find($id);
        $actionUrl = '/countries/' . $id;
        return view('countries-form', compact('country', 'actionUrl'));
    }

    public function update(Request $request, $id)
    {
        $country = Country::find($id);
        $request->validate([
            'name' => 'required',
        ]);
        $country->name = $request->name;
        $country->flag = $request->flag;
        $country->details = $request->details;
        $country->is_enabled = (bool) $request->is_enabled;
        $country->save();
        Session::flash('message', 'Data updated successfully !');
        return redirect('/countries');
    }

    public function destroy($id)
    {
        Country::find($id)->delete();
        Session::flash('message', 'Data deleted successfully !');
        return redirect('/countries');
    }
}

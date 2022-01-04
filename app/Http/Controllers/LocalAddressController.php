<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\LocalAddressData;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class LocalAddressController extends Controller
{
    public function store(Request $request, $id)
    {
        $request->validate([
            'local_address' => 'required|min:10|max:100',
            'local_apartment' => 'required',
            'local_city' => 'required',
            'local_pincode' => 'required|digits:6',
            'local_state' => 'required',
            'local_country' => 'required',
            'local_emergency_contact_name' => 'required',
            'local_emergency_contact_number' => 'required',
            'local_emergency_relationship' => 'required',
        ]);
        LocalAddressData::create([
            'user_id' => $id,
            'local_address' => $request->get('local_address'),
            'local_apartment' => $request->get('local_apartment'),
            'local_city' => $request->get('local_city'),
            'local_pincode' => $request->get('local_pincode'),
            'local_state' => $request->get('local_state'),
            'local_country' => $request->get('local_country'),
            'local_emergency_contact_name' => $request->get('local_emergency_contact_name'),
            'local_emergency_contact_number' => $request->get('local_emergency_contact_number'),
            'local_emergency_relationship' => $request->get('local_emergency_relationship'),
        ]);
        Session::flash('message', 'Data inserted successfully !');
        return redirect('/students');
    }
    public function show()
    {
        $user = Auth::user();
        $localAddress =  LocalAddressData::where('user_id', $user->id)->get()->first();
        //$user = User::find($id);

        if ($localAddress) {
            // If data is present then show data
            return view('student.local-address', compact('user', 'localAddress'));
        } else {
            // If no data is present then show form
            //$actionUrl = "/students/$id/employee-address-form";
            return view('student.employee-address-form', compact('user'));
        }
    }

    public function edit()
    {
        //$actionUrl = "/students/$id/employee-address-form";
        $localAddress = LocalAddressData::where('user_id', $user->id)->get()->first();
        //$user = User::find($id);
        $user = Auth::user();
        return view('student.employee-address-form', compact('user', 'localAddress'));
    }

    public function update(Request $request, $id)
    {
        $localAddress = LocalAddressData::where('user_id', $id)->get()->first();
        $request->validate([
            'local_address' => 'required|min:10|max:100',
            'local_apartment' => 'required',
            'local_city' => 'required',
            'local_pincode' => 'required|digits:6',
            'local_state' => 'required',
            'local_country' => 'required',
            'local_emergency_contact_name' => 'required',
            'local_emergency_contact_number' => 'required',
            'local_emergency_relationship' => 'required',
        ]);

        $localAddress->user_id = $id;
        $localAddress->local_apartment = $request->get('local_apartment');
        $localAddress->local_address = $request->get('local_address');
        $localAddress->local_city = $request->get('local_city');
        $localAddress->local_pincode = $request->get('local_pincode');
        $localAddress->local_state = $request->get('local_state');
        $localAddress->local_country = $request->get('local_country');
        $localAddress->local_emergency_contact_name = $request->get('local_emergency_contact_name');
        $localAddress->local_emergency_contact_number = $request->get('local_emergency_contact_number');
        $localAddress->local_emergency_relationship = $request->get('local_emergency_relationship');
        $localAddress->save();
        Session::flash('message', 'Data updated successfully !');
        return redirect('/students/' . $id);
    }
}

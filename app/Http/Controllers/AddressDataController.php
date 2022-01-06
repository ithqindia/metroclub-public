<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\EmployeeAddress;

class AddressDataController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'permanent_address' => 'required|min:10|max:100',
            'permanent_apartment' => 'required',
            'permanent_city' => 'required',
            'permanent_pincode' => 'required|digits:6',
            'permanent_state' => 'required',
            'permanent_country' => 'required',
            'permanent_emergency_contact_name' => 'required',
            'permanent_emergency_contact_number' => 'required|digits:10',
            'permanent_emergency_relationship' => 'required',
        ]);
        EmployeeAddress::create([
            'user_id' => $request->get('user_id'),
            'permanent_address' => $request->get('permanent_address'),
            'permanent_apartment' => $request->get('permanent_apartment'),
            'permanent_city' => $request->get('permanent_city'),
            'permanent_pincode' => $request->get('permanent_pincode'),
            'permanent_state' => $request->get('permanent_state'),
            'permanent_country' => $request->get('permanent_country'),
            'permanent_emergency_contact_name' => $request->get('permanent_emergency_contact_name'),
            'permanent_emergency_contact_number' => $request->get('permanent_emergency_contact_number'),
            'permanent_emergency_relationship' => $request->get('permanent_emergency_relationship'),
        ]);
        return view('success3');
    }

    public function show(Request $request)
    {
        $address = EmployeeAddress::where('user_id', $request->id)->get()->first();
        $user = User::find($request->id);
        return view('address', compact('address', 'user'));
    }

    public function update(Request $request)
    {
        $address = EmployeeAddress::find($request->address_id);
        $request->validate([
            'permanent_address' => 'required|min:10|max:100',
            'permanent_apartment' => 'required',
            'permanent_city' => 'required',
            'permanent_pincode' => 'required|digits:6',
            'permanent_state' => 'required',
            'permanent_country' => 'required',
            'permanent_emergency_contact_name' => 'required',
            'permanent_emergency_contact_number' => 'required|digits:10',
            'permanent_emergency_relationship' => 'required',
        ]);

        $address->permanent_address = $request->get('permanent_address');
        $address->permanent_apartment = $request->get('permanent_apartment');
        $address->permanent_city = $request->get('permanent_city');
        $address->permanent_pincode = $request->get('permanent_pincode');
        $address->permanent_state = $request->get('permanent_state');
        $address->permanent_country = $request->get('permanent_country');
        $address->permanent_emergency_contact_name = $request->get('permanent_emergency_contact_name');
        $address->permanent_emergency_contact_number = $request->get('permanent_emergency_contact_number');
        $address->permanent_emergency_relationship = $request->get('permanent_emergency_relationship');
        $address->save();
        return view('success3');
    }

    public function view(Request $request)
    {
        $user = User::with('employee_address_data')->find($request->id);
        return view('address-info', compact('user'));
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Models\Country;
use App\Http\Controllers\Controller;
use App\Http\Resources\CountryResource;

class CountryApiController extends Controller
{
    public function index()
    {
        $countries = Country::where('is_enabled', 1)->get()->sortBy('name');
        return CountryResource::collection($countries)->toJson();
    }

    public function show(Country $country)
    {
        $countryResource = new CountryResource(Country::find($country)->first());
        return $countryResource->toJson();
    }
}

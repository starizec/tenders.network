<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index(Country $country)
    {
        return view('countries.index', ['countries' => $country->getCountries()]);
    }

    public function create()
    {
        return view('countries.create');
    }

    public function store(Request $request, Country $country)
    {
        $country->country_name = $request->country_name;
        $country->country_language = $request->country_language;
        $country->created_by = 1;
        $country->updated_by = 1;

        $country->save();

        return back();
    }

    public function edit(Country $country, $id)
    {   
        return view('countries.edit', ['country' => $country->getCountry($id)]);
    }

    public function update(Request $request, Country $country)
    {
        $country->where('id', $request->country_id)->update(['country_name' => $request->country_name,
                                                             'country_language' => $request->country_language,
                                                             'updated_by' => 1]);

        return back();
    }
}

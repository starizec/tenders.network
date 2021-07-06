<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use Session;

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
        $country->currency_name = $request->currency_name;
        $country->currency_iso = $request->currency_iso;
        $country->currency_symbol = $request->currency_symbol;
        $country->created_by = 1;
        $country->updated_by = 1;

        $country->save();

        return redirect('/countries');
    }

    public function edit(Country $country, $id)
    {   
        return view('countries.edit', ['country' => $country->getCountry($id)]);
    }

    public function update(Request $request, Country $country)
    {
        $country->where('id', $request->country_id)->update(['country_name' => $request->country_name,
                                                             'country_language' => $request->country_language,
                                                             'currency_name' => $request->currency_name,
                                                             'currency_iso' => $request->currency_iso,
                                                             'currency_symbol' => $request->currency_symbol,
                                                             'updated_by' => 1]);

        return back();
    }

    public function select(Request $request){
        Session::put('country_id', $request->country_id);

        return back();
    }
}

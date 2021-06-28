<?php

namespace App\Http\Controllers;

use App\Models\Place;
use App\Models\County;
use Illuminate\Http\Request;
use Session;

class PlaceController extends Controller
{
    public function index(Place $place)
    {
        return view('places.index', ['places' => $place->getPlaces(Session::get('country_id'))]);
    }

    public function create(County $county)
    {
        return view('places.create', ['counties' => $county->getCounties()]);
    }

    public function store(Request $request, Place $place)
    {
        $place->country_id = $request->country_id;
        $place->place_name = $request->place_name;
        $place->county_id = $request->county_id;
        $place->created_by = 1;
        $place->updated_by = 1;

        $place->save();

        return redirect('/places');
    }

    public function edit(Place $place, County $county, $id)
    {
        return view('places.edit', ['place' => $place->getPlace($id),
                                    'counties' => $county->getCounties()]);
    }

    public function update(Request $request, Place $place)
    {
        $place->where('id', $request->place_id)
              ->update(['country_id' => $request->country_id,
                        'place_name' => $request->place_name,
                        'county_id' => $request->county_id,
                        'updated_by' => 1]);
        
        return back();
    }
}

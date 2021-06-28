<?php

namespace App\Http\Controllers;

use App\Models\Place;
use App\Models\Country;
use Illuminate\Http\Request;
use Session;

class PlaceController extends Controller
{
    public function index(Place $place)
    {
        return view('places.index', ['places' => $place->getPlaces(Session::get('country_id'))]);
    }

    public function create()
    {
        return view('places.create');
    }

    public function store(Request $request, Place $place)
    {
        $place->place = $request->country_id;
        $place->place_name = $request->place_name;
        $place->county_id = $request->county_id;
        $place->created_by = 1;
        $place->updated_by = 1;

        $place->save();

        return redirect('/places');
    }

    public function edit(Place $place, $id)
    {
        return view('places.edit', ['place' => $place->getPlace($id)]);
    }

    public function update(Request $request, Place $place)
    {
        
    }
}

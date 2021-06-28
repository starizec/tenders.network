<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\ScrapeData;
use App\Models\Place;
use Illuminate\Http\Request;
use Session;

class LocationController extends Controller
{
    public function index(Location $location)
    {   
        return view('locations.index', ['locations' => $location->getLocations(Session::get('country_id'))]);
    }

    public function edit(Location $location, ScrapeData $scrapedata, Place $place, $id)
    {
        return view('locations.edit', ['location' => $location->getLocation($id),
                                       'places' => $place->where('country_id', Session::get('country_id'))->get()]);
    }

    public function destroy(Request $request){

    }
}

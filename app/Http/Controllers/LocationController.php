<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\ScrapeData;
use App\Models\Place;
use App\Models\County;
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

    public function update(Request $request, Location $location)
    {
        $location->where('id', $request->location_id)
                 ->update(['location_url' => $request->location_url,
                           'location_name' => $request->location_name,
                           'place_id' => $request->place_id,
                           'location_status' => $request->location_status,
                           'updated_by' => 1]);

        return back();
    }

    public function create(Place $place, County $county)
    {
        return view('locations.create', ['places' => $place->where('country_id', Session::get('country_id'))->with('county')->get(),
                                         'counties' => $county->where('country_id', Session::get('country_id'))->get()]);
    }

    public function store(Request $request, Location $location)
    {
        if($request->place_id != 0){
            $place_id = $request->place_id;
        }

        if($request->county_id != 0){
            $county_id = $request->county_id;
        }

        if($request->filled('new_place')){
            if($request->filled('new_county')){
                $county_instance = new County();
                $county_instance->country_id = $request->country_id;
                $county_instance->county_name = $request->new_county;
                $county_instance->created_by = 1;
                $county_instance->updated_by = 1;
                $county_instance->save();

                $county_id = $county_instance->id;
            }

            $place_instance = new Place();
            $place_instance->country_id = $request->country_id;
            $place_instance->place_name = $request->new_place;
            $place_instance->county_id = $county_id;
            $place_instance->created_by = 1;
            $place_instance->updated_by = 1;
            $place_instance->save();

            $place_id = $place_instance->id;
        }

        $location->location_name = $request->location_name;
        $location->location_url = $request->location_url;
        $location->country_id = $request->country_id;
        $location->place_id = $place_id;
        $location->location_status = $request->location_status;
        $location->created_by = 1;
        $location->updated_by = 1;

        $location->save();

        return redirect('/locations');
    }

    public function fastSearch()
    {
        return view('locations.fast_search', ['locations' => Location::select('id', 'location_name', 'location_url')
                                                                     ->where('country_id', Session::get('country_id'))
                                                                     ->get()]);
    }
}

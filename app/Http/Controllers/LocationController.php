<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function index(Location $location)
    {   
        return view('locations.index', ['locations' => $location->getLocations()]);
    }

    public function edit(Location $location, $id){
        return view('locations.edit', ['location' => $location->getLocation($id)]);
    }

    public function destroy(Request $request){
        
    }
}

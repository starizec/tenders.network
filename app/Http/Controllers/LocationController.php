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
}

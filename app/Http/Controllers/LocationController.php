<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\ScrapeData;
use Illuminate\Http\Request;
use Session;

class LocationController extends Controller
{
    public function index(Location $location)
    {   
        return view('locations.index', ['locations' => $location->getLocations(Session::get('country_id'))]);
    }

    public function edit(Location $location, ScrapeData $scrapedata, $id){

        return view('locations.edit', ['location' => $location->getLocation($id),
                                       'total_link_count' => $scrapedata->countScrapeData(3650, $id),
                                       'link_count_30_days' => $scrapedata->countScrapeData(30, $id),
                                       'link_count_60_days' => $scrapedata->countScrapeData(60, $id),
                                       'link_count_365_days' => $scrapedata->countScrapeData(365, $id)]);
    }

    public function destroy(Request $request){

    }
}

<?php

namespace App\Http\Controllers;

use App\Models\ScrapeLocation;
use Illuminate\Http\Request;

class ScrapeLocationController extends Controller
{
    public function index(ScrapeLocation $scrapeLocation, $http_status_code, $start, $end)
    {
        $scrape_locations = $scrapeLocation->getScrapeLocations($http_status_code, $start, $end, 50);
        
        return view('scrape_locations.index', ['scrape_locations' => $scrape_locations]);
    }
}

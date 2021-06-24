<?php

namespace App\Http\Controllers;

use App\Models\ScrapeLocation;
use Illuminate\Http\Request;

class ScrapeLocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($http_status_code, $start, $end)
    {
        $scrape_locations_instance = new ScrapeLocation();
        $scrape_locations = $scrape_locations_instance->getScrapeLocations($http_status_code, $start, $end, 50);
        
        return view('scrape_locations.index', ['scrape_locations' => $scrape_locations]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ScrapeLocation  $scrapeLocation
     * @return \Illuminate\Http\Response
     */
    public function show($status_code, $start, $end)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ScrapeLocation  $scrapeLocation
     * @return \Illuminate\Http\Response
     */
    public function edit(ScrapeLocation $scrapeLocation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ScrapeLocation  $scrapeLocation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ScrapeLocation $scrapeLocation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ScrapeLocation  $scrapeLocation
     * @return \Illuminate\Http\Response
     */
    public function destroy(ScrapeLocation $scrapeLocation)
    {
        //
    }
}

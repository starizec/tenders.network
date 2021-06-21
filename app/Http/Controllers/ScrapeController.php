<?php

namespace App\Http\Controllers;

use App\Models\Scrape;
use Illuminate\Http\Request;

class ScrapeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $scrapes_instance = new Scrape();
        $scrapes = $scrapes_instance->getScrapes();
        
        return view('scrapes.index', ['scrapes' => $scrapes]);
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
     * @param  \App\Models\Scrape  $scrape
     * @return \Illuminate\Http\Response
     */
    public function show(Scrape $scrape)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Scrape  $scrape
     * @return \Illuminate\Http\Response
     */
    public function edit(Scrape $scrape)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Scrape  $scrape
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Scrape $scrape)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Scrape  $scrape
     * @return \Illuminate\Http\Response
     */
    public function destroy(Scrape $scrape)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Tender;
use App\Models\Location;
use Illuminate\Http\Request;
use Session;

class TenderController extends Controller
{
    public function index(Tender $tender)
    {
        return view('tenders.index', ['tenders' => $tender->getTenders(Session::get('country_id'))]);
    }

    public function create(Location $location)
    {
        return view('tenders.create', ['locations' => $location::where('country_id', Session::get('country_id'))->select('id', 'location_name', 'location_url')->get()]);
    }

    public function store(Request $request, Tender $tender)
    {
        $tender->country_id = $request->country_id;
        $tender->location_id = $request->location_id;
        $tender->tender_title = $request->tender_title;
        $tender->tender_url = $request->tender_url;
        $tender->tender_value = $request->tender_value;
        $tender->created_by = 1;
        $tender->updated_by = 1;
        $tender->save();

        return redirect('/tenders');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tender  $tender
     * @return \Illuminate\Http\Response
     */
    public function show(Tender $tender)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tender  $tender
     * @return \Illuminate\Http\Response
     */
    public function edit(Tender $tender)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tender  $tender
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tender $tender)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tender  $tender
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tender $tender)
    {
        //
    }
}

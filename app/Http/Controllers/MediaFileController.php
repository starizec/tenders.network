<?php

namespace App\Http\Controllers;

use App\Models\TenderContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MediaFileController extends Controller
{
    public function index()
    {
        return view('media.index', ['files' => Storage::files('files')]);
    }

    public function create()
    {
        return view('media.create');
    }

    public function store(Request $request)
    {
        $request->file('media_file')->store('files');

        return redirect('/media');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TenderContent  $tenderContent
     * @return \Illuminate\Http\Response
     */
    public function show(TenderContent $tenderContent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TenderContent  $tenderContent
     * @return \Illuminate\Http\Response
     */
    public function edit(TenderContent $tenderContent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TenderContent  $tenderContent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TenderContent $tenderContent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TenderContent  $tenderContent
     * @return \Illuminate\Http\Response
     */
    public function destroy(TenderContent $tenderContent)
    {
        //
    }
}

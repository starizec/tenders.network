<?php

namespace App\Http\Controllers;

use App\Models\County;
use Illuminate\Http\Request;
use Session;

class CountyController extends Controller
{
    public function index(County $county)
    {
        return view('counties.index', ['counties' => $county->getCounties(Session::get('country_id'))]);
    }

    public function create()
    {
        return view('counties.create');
    }

    public function store(Request $request, County $county)
    {
        $county->country_id = $request->country_id;
        $county->county_name = $request->county_name;
        $county->created_by = 1;
        $county->updated_by = 1;

        $county->save();

        return redirect('/counties');
    }

    public function edit(County $county, $id)
    {
        return view('counties.edit', ['county' => $county->getCounty($id)]);
    }

    public function update(Request $request, County $county)
    {
        $county->where('id', $county->id)
               ->update(['country_id' => $request->country_id,
                         'county_name' => $request->county_name,
                         'updated_by' => 1]);

        return back();
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use App\Models\Country;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    public function index(Partner $partner)
    {
        return view('partners.index', ['partners' => $partner->getPartners()]);
    }

    public function create(Country $country)
    {
        return view('partners.create', ['countries' => $country->all()]);
    }

    public function store(Request $request, Partner $partner)
    {
        $partner->partner_name = $request->partner_name;
        $partner->partner_owner = $request->partner_owner;
        $partner->partner_email = $request->partner_email;
        $partner->country_id = $request->country_id;
        $partner->partner_notes = $request->partner_notes;
        $partner->created_by = 1;
        $partner->updated_by = 1;
        $partner->save();

        return redirect('/partners');
    }

    public function edit(Partner $partner, $id)
    {
        return view('partners.edit', ['partner' => $partner->where('id', $id)->first(),
                                      'countries' => Country::all()]);
    }

    public function update(Request $request, Partner $partner)
    {
        $partner->where('id', $request->partner_id)
                ->update([
                    'partner_name' =>  $request->partner_name,
                    'partner_owner' =>  $request->partner_owner,
                    'partner_email' =>  $request->partner_email,
                    'country_id' =>  $request->country_id,
                    'partner_notes' =>  $request->partner_notes
                ]);

        return back();
    }
}

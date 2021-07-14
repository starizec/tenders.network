<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Partner;

class PartnerController extends Controller
{
    public function show($id, Partner $partner)
    {
        return $partner->where('id', $id)
                       ->with('country')
                       ->with('settings')
                       ->first();
    }
}

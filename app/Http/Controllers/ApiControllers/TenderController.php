<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tender;

class TenderController extends Controller
{
    public function index(Request $request, Tender $tender)
    {
        $tenders = $tender->getTenders($request->header('country-id'));

        $tenders = $tenders->makeHidden(['country_id', 'location_id','created_by', 'updated_by', 'created_at', 'updated_at']);

        return response()->json($tenders);
    }
}

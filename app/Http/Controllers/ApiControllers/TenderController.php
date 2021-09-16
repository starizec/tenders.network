<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tender;
use App\Models\User;
use App\Models\Partner;

class TenderController extends Controller
{
    public function index(Request $request, Tender $tender, User $user, Partner $partner)
    {   
        $user = $user->where('id', $request->header('user-id'))->select('filter', 'partner_id')->first();

        $filters = unserialize(base64_decode($user->filter));
        
        $country_id = $partner->where('id', $user->partner_id)->pluck('country_id');

        $types = $filters['types'];
        $categories = $filters['categories'];
        $tags = $filters['tags'];
        $counties = $filters['counties'];

        $tenders = $tender->getTenders($country_id, $types, $categories, $tags, $counties);

        $tenders = $tenders->makeHidden(['country_id', 'location_id','created_by', 'updated_by', 'created_at', 'updated_at']);

        return response()->json($tenders);
    }
}

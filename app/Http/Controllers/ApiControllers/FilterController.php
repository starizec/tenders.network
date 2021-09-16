<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Services\UserFilterService;

class FilterController extends Controller
{
    public function storeUserFilter(Request $request, User $user){

        $filters = [];
        $filters['types'] = $request->types;
        $filters['categories'] = $request->categories;
        $filters['tags'] = $request->tags;
        $filters['counties'] = $request->counties;

        $user->where('id', $request->user_id)->update(['filter' => base64_encode(serialize($filters))]);
        
        return response($request, 201);
    }
    
    public function resetUserFilter(Request $request, User $user)
    {
        $user->where('id', $request->user_id)->update(['filter' => UserFilterService::reset(1)]);
    }
}

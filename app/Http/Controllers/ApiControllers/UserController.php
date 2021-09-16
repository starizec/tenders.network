<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Auth\AuthenticationException;

class UserController extends Controller
{
    public function login(Request $request)
    {
        if(!auth()->attempt($request->only('email', 'password'))){
            throw new AuthenticationException();
        }
    }

    public function show($user_id, User $user)
    {
        $user = $user->where('id', $user_id)->first();

        return response()->json($user,200, array(), JSON_UNESCAPED_SLASHES);
    }

    public function filter($user_id, User $user)
    {
        $user = $user->where('id', $user_id)->pluck('filter');
        
        $user = unserialize(base64_decode($user));
        return response()->json($user, 200);
    }
}

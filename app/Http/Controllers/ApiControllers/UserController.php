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
        $user = $user->where('id', $user_id)->frist();

        return response()->json($user);
    }
}

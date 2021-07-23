<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ApiControllers\PartnerController;
use App\Http\Controllers\ApiControllers\TenderController;
use App\Http\Controllers\ApiControllers\UserController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/partners/{partner_id}/menu',[PartnerController::class, 'menu']);
Route::get('/partners/{partner_id}/filters',[PartnerController::class, 'filters']);

Route::get('/tenders', [TenderController::class, 'index']);

Route::get('/users/{user_id}', [UserController::class, 'show']);

Route::post('/login', [UserController::class, 'login']);
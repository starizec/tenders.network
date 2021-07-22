<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ApiControllers\PartnerController;
use App\Http\Controllers\ApiControllers\TenderController;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/partners/{partner_id}/menu',[PartnerController::class, 'menu']);
Route::get('/partners/{partner_id}/filters',[PartnerController::class, 'filters']);

Route::get('/tenders', [TenderController::class, 'index']);

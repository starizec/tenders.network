<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ScrapeController;
use App\Http\Controllers\ScrapeLocationController;
use App\Http\Controllers\ScrapeDataController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\CountryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('scrapes')->group(function(){
    Route::get('/', [ScrapeController::class, 'index']);
    Route::get('/locations/{http_status_code}/{start}/{end}', [ScrapeLocationController::class, 'index']);
    Route::post('/scrape-data', [ScrapeDataController::class, 'download'])->name('download-scrape');
});

Route::prefix('locations')->group(function(){
    Route::get('/', [LocationController::class, 'index']);
    Route::get('/{id}/edit', [LocationController::class, 'edit']);
    Route::post('/update', [LocationController::class, 'update'])->name('update-location');
});

Route::prefix('countries')->group(function(){
    Route::get('/', [CountryController::class, 'index']);
    Route::get('/create', [CountryController::class, 'create']);
    Route::post('/store', [CountryController::class, 'store'])->name('store-country');
    Route::get('/{id}/edit', [CountryController::class, 'edit']);
    Route::post('/update', [CountryController::class, 'update'])->name('update-country');
    Route::post('/select', [CountryController::class, 'select'])->name('select-country');
});

<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ScrapeController;
use App\Http\Controllers\ScrapeLocationController;
use App\Http\Controllers\ScrapeDataController;
use App\Http\Controllers\LocationController;

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
    Route::post('/scrape-data', [ScrapeDataController::class, 'download'])->name('download_scrape');
});

Route::prefix('locations')->group(function(){
    Route::get('/', [LocationController::class, 'index']);
});

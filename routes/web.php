<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ScrapeController;
use App\Http\Controllers\ScrapeLocationController;
use App\Http\Controllers\ScrapeDataController;
use App\Http\Controllers\TenderController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\CountyController;
use App\Http\Controllers\PlaceController;

Route::get('/', function () {
    return redirect('/scrapes');
});

Route::prefix('scrapes')->group(function(){
    Route::get('/', [ScrapeController::class, 'index']);
    Route::get('/locations/{http_status_code}/{start}/{end}', [ScrapeLocationController::class, 'index']);
    Route::post('/scrape-data', [ScrapeDataController::class, 'download'])->name('download-scrape');
});

Route::prefix('tenders')->group(function(){
    Route::get('/', [TenderController::class, 'index']);
    Route::get('/create', [TenderController::class, 'create']);
    Route::post('/store', [TenderController::class, 'store'])->name('store-tender');
});

Route::prefix('locations')->group(function(){
    Route::get('/', [LocationController::class, 'index']);
    Route::get('/{id}/edit', [LocationController::class, 'edit']);
    Route::post('/update', [LocationController::class, 'update'])->name('update-location');
    Route::get('/create', [LocationController::class, 'create']);
    Route::post('/store', [LocationController::class, 'store'])->name('store-location');
});

Route::prefix('types')->group(function(){
    Route::get('/', [TypeController::class, 'index']);
    Route::get('/create', [TypeController::class, 'create']);
    Route::post('/store', [TypeController::class, 'store'])->name('store-type');
    Route::get('/{id}/edit', [TypeController::class, 'edit']);
    Route::post('/update', [TypeController::class, 'update'])->name('update-type');

});

Route::prefix('categories')->group(function(){
    Route::get('/', [CategoryController::class, 'index']);
    Route::get('/create', [CategoryController::class, 'create']);
    Route::post('/store', [CategoryController::class, 'store'])->name('store-category');
    Route::get('/{id}/edit', [CategoryController::class, 'edit']);
    Route::post('/update', [CategoryController::class, 'update'])->name('update-category');

});

Route::prefix('tags')->group(function(){
    Route::get('/', [TagController::class, 'index']);
    Route::get('/create', [TagController::class, 'create']);
    Route::post('/store', [TagController::class, 'store'])->name('store-tag');
    Route::get('/{id}/edit', [TagController::class, 'edit']);
    Route::post('/update', [TagController::class, 'update'])->name('update-tag');

});

Route::prefix('countries')->group(function(){
    Route::get('/', [CountryController::class, 'index']);
    Route::get('/create', [CountryController::class, 'create']);
    Route::post('/store', [CountryController::class, 'store'])->name('store-country');
    Route::get('/{id}/edit', [CountryController::class, 'edit']);
    Route::post('/update', [CountryController::class, 'update'])->name('update-country');
    Route::post('/select', [CountryController::class, 'select'])->name('select-country');
});

Route::prefix('counties')->group(function(){
    Route::get('/', [CountyController::class, 'index']);
    Route::get('/create', [CountyController::class, 'create']);
    Route::post('/store', [CountyController::class, 'store'])->name('store-county');
    Route::get('/{id}/edit', [CountyController::class, 'edit']);
    Route::post('/update', [CountyController::class, 'update'])->name('update-county');
});

Route::prefix('places')->group(function(){
    Route::get('/', [PlaceController::class, 'index']);
    Route::get('/create', [PlaceController::class, 'create']);
    Route::post('/store', [PlaceController::class, 'store'])->name('store-place');
    Route::get('/{id}/edit', [PlaceController::class, 'edit']);
    Route::post('/update', [PlaceController::class, 'update'])->name('update-place');
});
<?php

use App\Http\Controllers\PackageController;
use App\Http\Controllers\ShipmentController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::resource('shipments', ShipmentController::class);
Route::resource('users', UserController::class);
Route::resource('packages', PackageController::class);
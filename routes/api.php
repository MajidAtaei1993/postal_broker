<?php

use App\Http\Controllers\PackageController;
use App\Http\Controllers\ReceiverController;
use App\Http\Controllers\SenderController;
use App\Http\Controllers\ShipmentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::resource('shipments', ShipmentController::class);
Route::resource('senders', SenderController::class);
Route::resource('receivers', ReceiverController::class);
Route::resource('packages', PackageController::class);
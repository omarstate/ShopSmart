<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\RewardsController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('guest')->group(function () {
    Route::post('/register', [RegisteredUserController::class, 'create']);
});

Route::post('/login', [SessionController::class, 'create'])->middleware('api');

Route::middleware('auth')->group(function (){
    Route::delete('/logout', [SessionController::class, 'destroy']);
    Route::get('/rewards', [RewardsController::class, 'getRewards']);
    Route::get('/loyalty/points', [ProfileController::class, 'getPoints']);
});

Route::post('/purchase', [PurchaseController::class, 'addPurchase']);

Route::middleware('auth:sanctum')->get('/purchases', [PurchaseController::class, 'getPurchases']);





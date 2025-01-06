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
    Route::get('/register', [RegisteredUserController::class, 'index']);
    Route::post('/register', [RegisteredUserController::class, 'create']);
    Route::get('/login', [SessionController::class, 'index']);
    Route::post('/login', [SessionController::class, 'create']);
});

Route::middleware('auth')->group(function (){
    Route::get('/profile', [ProfileController::class, 'index']);
    Route::get('/purchases', [PurchaseController::class, 'getPurchases']);
    Route::delete('/logout', [SessionController::class, 'destroy']);
    Route::get('/rewards', [RewardsController::class, 'getRewards']);
    Route::get('/loyalty/points', [ProfileController::class, 'getPoints']);
});

Route::post('/purchase', [PurchaseController::class, 'addPurchase']);

Route::view('/test', 'test');




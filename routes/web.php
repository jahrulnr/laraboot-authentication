<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class, 'index']);
Route::post('/', [AuthController::class, 'login']);

Route::middleware('auth')->group(function(){
    Route::get('/home', [ HomeController::class, 'index' ])->name('home');
});

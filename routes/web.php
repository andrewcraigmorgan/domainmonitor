<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DomainController;

Route::get('/', [DomainController::class, 'index']);
Route::post('/domains', [DomainController::class, 'store']);

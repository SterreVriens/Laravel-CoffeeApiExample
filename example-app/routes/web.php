<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoffeeController;

Route::get('/', [CoffeeController::class, 'index']);
Route::get('/coffees/{id}', [CoffeeController::class, 'show']);
Route::get('/coffees', [CoffeeController::class, 'filter']);
Route::get('/coffees', [CoffeeController::class, 'search'])->name('coffees.search');


<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SeriesController;
use App\Http\Controllers\CharacterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [CharacterController::class, 'index']);

// Show Create Form
Route::get('/characters/create', [CharacterController::class, 'create']);

// Store Data
Route::post('/characters', [CharacterController::class, 'store']);
Route::post('/series', [SeriesController::class, 'store']);

// Toggle Data
Route::patch('/characters/{character}', [CharacterController::class, 'toggle']);

// Update Data
Route::put('/characters/{character}', [CharacterController::class, 'edit']);

// Destroy Data
Route::delete('/characters/{character}', [CharacterController::class, 'destroy']);

Route::get('/characters/{character}', [CharacterController::class, 'show']);

// Common Resource Routes:
// index - Show all models
// show - Show single model
// create - Show form to create new model
// store - Store new model
// edit - Edit Form
// update - Update model
// destroy - Delete model

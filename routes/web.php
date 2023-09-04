<?php

use Illuminate\Support\Facades\Route;

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

use App\Http\Controllers\PageHomeController;
use App\Http\Controllers\ProjectController;

Route::get('/', [PageHomeController::class, 'index'])->name('home');

Route::post('/projects', [ProjectController::class, 'store']);

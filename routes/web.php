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

Route::post('/projects', [ProjectController::class, 'store'])->name('projects.store');
Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');

// Route::post('/projects', function () {
//     App\Models\Project::create(request(['title', 'description']));
// });

// Route::get('/projects', function () {
//     $projects = App\Models\Project::all();

//     return view('projects.index', compact('projects'));
// });

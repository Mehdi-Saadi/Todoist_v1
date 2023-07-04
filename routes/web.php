<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [HomeController::class, 'inbox'])->name('inbox');
// task routes
Route::prefix('task')->group(function () {
    Route::post('/create', [TaskController::class, 'create'])->name('createTask');
    Route::post('/update/{task}', [TaskController::class, 'update'])->name('updateTask');
    Route::post('/destroy/{task}', [TaskController::class, 'destroy'])->name('destroyTask');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

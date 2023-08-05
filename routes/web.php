<?php

use App\Http\Controllers\HomeController;
//use App\Http\Controllers\LabelController;
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

Auth::routes(['verify' => true]);

Route::get('/', [HomeController::class, 'index']);
Route::get('/app', [HomeController::class, 'app'])->name('app');
//Route::get('/filter_label', [HomeController::class, 'filter_label'])->name('filter_label');

// task routes
Route::prefix('task')->group(function () {
//    Route::post('/', [HomeController::class, 'taskDetails']);
    Route::post('/create', [TaskController::class, 'create'])->name('createTask');
//    Route::put('/update/{task}', [TaskController::class, 'update'])->name('updateTask');
    Route::delete('/destroy', [TaskController::class, 'destroy'])->name('destroyTask');
});

Route::prefix('tasks')->group(function () {
    // update all tasks ondrop (sorting)
    Route::put('/update', [TaskController::class, 'updateAll']);
    // set task to done
    Route::put('/done', [TaskController::class, 'setTaskDone']);
    // set task to not done
    Route::put('/notDone', [TaskController::class, 'setTaskNotDone']);
});

// label routes
//Route::prefix('label')->group(function () {
//    Route::post('/create', [TaskController::class, 'create'])->name('createLabel');
//    Route::put('/update/{task}', [TaskController::class, 'update'])->name('updateLabel');
//    Route::delete('/destroy/{task}', [TaskController::class, 'destroy'])->name('destroyLabel');
//});

//Route::put('/labels/update', [LabelController::class, 'updateAll']);

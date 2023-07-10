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

Route::get('/', [HomeController::class, 'index']);
Route::get('/inbox', [HomeController::class, 'inbox'])->name('inbox');


Route::get('/test', function () {
    for($i = 1; $i != 5; $i++) {
        echo \auth()->user()->tasks()->findOrFail($i) . '<br>';
    }
    //    return view('sort');
});


// task routes
Route::prefix('task')->group(function () {
    Route::post('/create', [TaskController::class, 'create'])->name('createTask');
    Route::put('/update/{task}', [TaskController::class, 'update'])->name('updateTask');
    Route::delete('/destroy/{task}', [TaskController::class, 'destroy'])->name('destroyTask');
});

// update all tasks ondrop
Route::put('/tasks/update', [TaskController::class, 'updateAll']);
// set task to done
Route::put('/tasks/done', [TaskController::class, 'setDoneTask']);

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

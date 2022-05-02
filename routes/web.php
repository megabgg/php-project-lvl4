<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LabelController;
use App\Http\Controllers\TaskStatusController;
use App\Http\Controllers\TaskController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

Route::get('/', function () {
    return view('home');
})->name('home');

Route::middleware('auth')->group(function () {
    Route::resource('labels', LabelController::class)->except('index', 'show')->names('labels.auth');
    Route::resource('task_statuses', TaskStatusController::class)->except('index', 'show')->names('task_statuses.auth');
    Route::resource('tasks', TaskController::class)->except('index')->names('tasks.auth');
});
Route::resource('labels', LabelController::class)->only('index')->names('labels');
Route::resource('task_statuses', TaskStatusController::class)->only('index')->names('task_statuses');
Route::resource('tasks', TaskController::class)->only('index')->names('tasks');

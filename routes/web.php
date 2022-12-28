<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CompanyController;

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

Route::get('/', function () {
    return view('welcome');
});


Route::controller(UserController::class)->prefix('user')->group(function () {
    Route::get('/', 'index');
    Route::post('create', 'create')->name('user.create');
    Route::get('edit/{id}', 'edit');
    Route::get('show/{id}', 'show');
    Route::put('update/{id}', 'update');
    Route::delete('delete/{id}', 'destroy');
});


Route::controller(CompanyController::class)->prefix('company')->group(function () {
    Route::get('/', 'index');
    Route::post('create', 'create')->name('company.create');
    Route::get('edit/{id}', 'edit');
    Route::get('show/{id}', 'show');
    Route::post('update/{id}', 'update');
    Route::get('delete/{id}', 'destroy');
});

Route::controller(TaskController::class)->prefix('task')->group(function () {
    Route::get('/', 'index');
    Route::post('create', 'create')->name('task.create');
    Route::get('edit/{id}', 'edit');
    Route::post('updates/{id}', 'update');
    Route::get('delete/{id}', 'destroy');
});

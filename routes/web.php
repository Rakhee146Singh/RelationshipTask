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
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});


Route::group(['prefix' => 'user', 'middleware' => 'role:user'], function () {
    Route::controller(UserController::class)->group(function () {
        Route::get('/', 'index');
        Route::post('create', 'create')->name('user.create');
        Route::get('edit/{id}', 'edit');
        Route::get('show/{id}', 'show');
        Route::put('update/{id}', 'update');
        Route::delete('delete/{id}', 'destroy');
        Route::get('', 'home');
    });
});


Route::controller(CompanyController::class)->prefix('company')->group(function () {
    Route::get('/', 'index');
    Route::post('create', 'create')->name('company.create');
    Route::get('edit/{id}', 'edit');
    Route::get('show/{id}', 'show');
    Route::post('update/{id}', 'update');
    Route::delete('delete/{id}', 'destroy');
    Route::get('', 'home');
})->middleware('role:user');

Route::controller(TaskController::class)->prefix('task')->group(function () {
    Route::get('/', 'index');
    Route::post('create', 'create')->name('task.create');
    Route::get('edit/{id}', 'edit');
    Route::post('updates/{id}', 'update');
    Route::delete('delete/{id}', 'destroy');
    Route::get('', 'home');
});

Route::get('year', function () {
    dd('done');
})->middleware('year:2022');

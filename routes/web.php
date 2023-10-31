<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['middleware' => ['auth']], function () {
    Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('admin.users.index');

    Route::get('/get-users-data', [App\Http\Controllers\UserController::class, 'getUsersData'])->name('admin.get.users.data');

    Route::get('/users/create', [App\Http\Controllers\UserController::class, 'create'])->name('admin.users.create');

    Route::post('/users/store', [App\Http\Controllers\UserController::class, 'store'])->name('admin.users.store');

    Route::get('/users/edit/{id}',  [App\Http\Controllers\UserController::class, 'edit'])->name('admin.users.edit');

    Route::put('/users/update/{id}',  [App\Http\Controllers\UserController::class, 'update'])->name('admin.users.update');
});



Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('admin.dashboard');

Route::get('/tasks/{tipoTab}', [App\Http\Controllers\TaskController::class, 'index'])->name('admin.tasks.index');

// Route::resource('users', UserController::class)->names('admin.users');

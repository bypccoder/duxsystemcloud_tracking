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


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('admin.dashboard.index');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('admin.users.index');

    Route::get('/get-users-data', [App\Http\Controllers\UserController::class, 'getUsersData'])->name('admin.get.users.data');

    Route::get('/users/show/{id}',  [App\Http\Controllers\UserController::class, 'show'])->name('admin.users.show');

    Route::get('/users/create', [App\Http\Controllers\UserController::class, 'create'])->name('admin.users.create');

    Route::post('/users/store', [App\Http\Controllers\UserController::class, 'store'])->name('admin.users.store');

    Route::get('/users/edit/{id}',  [App\Http\Controllers\UserController::class, 'edit'])->name('admin.users.edit');

    Route::put('/users/update/{id}',  [App\Http\Controllers\UserController::class, 'update'])->name('admin.users.update');

    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('admin.dashboard.index');

    Route::get('/dashboard/show/{id}', [App\Http\Controllers\DashboardController::class, 'show'])->name('admin.dashboard.show');

    Route::get('/tasks/{tipoTab}', [App\Http\Controllers\TaskController::class, 'index'])->name('admin.tasks.index');

    Route::get('/form_postsale', [App\Http\Controllers\FormPostVentaController::class, 'index'])->name('admin.form_postsale.index');

    Route::get('/get-form-postsale-data', [App\Http\Controllers\FormPostVentaController::class, 'getFormsPostSaleData'])->name('admin.get.form_postsale.data');

    Route::get('/form_postsale/show/{id}',  [App\Http\Controllers\FormPostVentaController::class, 'show'])->name('admin.form_postsale.show');

    Route::get('/form_postsale/create', [App\Http\Controllers\FormPostVentaController::class, 'create'])->name('admin.form_postsale.create');

    Route::post('/form_postsale/store', [App\Http\Controllers\FormPostVentaController::class, 'store'])->name('admin.form_postsale.store');

    Route::get('/form_postsale/edit/{id}',  [App\Http\Controllers\FormPostVentaController::class, 'edit'])->name('admin.form_postsale.edit');

    Route::put('/form_postsale/update/{id}',  [App\Http\Controllers\FormPostVentaController::class, 'update'])->name('admin.form_postsale.update');

});




// Route::resource('users', UserController::class)->names('admin.users');

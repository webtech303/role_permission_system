<?php

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\RolesController;
// use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// use App\Http\Controllers\DashboardController as ControllersDashboardController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();
    Route::prefix('admin')->group(function () {
    Route::get('/',[DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/roles',[RolesController::class, 'index'])->name('roles.index');
    Route::get('/roles/edit/{id}',[RolesController::class, 'edit'])->name('roles.edit');
    Route::post('/roles/update/{id}',[RolesController::class, 'update'])->name('roles.update');
    Route::get('/roles/create',[RolesController::class, 'create']);
    Route::post('/roles/store',[RolesController::class, 'store'])->name('roles.store');
  });

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

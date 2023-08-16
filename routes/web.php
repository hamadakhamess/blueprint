<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\ProfileController;
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


Route::middleware('auth')->prefix('admin')->as('admin.')->group(function () {
       Route::get('/',[AdminController::class,'index'])->name('dashboard');

       //users
       Route::resource('users',UsersController::class);
       Route::get('users/data/get',[UsersController::class,'data'])->name('users.data');


      //users
      Route::resource('roles',RolesController::class);
      Route::get('roles/data/get',[RolesController::class,'data'])->name('roles.data');





});

require __DIR__.'/auth.php';

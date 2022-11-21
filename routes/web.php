<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [AuthController::class, "login"]);
Route::get('/login', [AuthController::class, "login"])->name("adminLogin");
Route::get('/logout', [AuthController::class, "adminLogout"])->name("adminLogout");
Route::post('/handleLogin', [AuthController::class,'handleLogin'])->name('handleLogin');


Route::group(['middleware' => 'auth'], function () {
    Route::get('home', [HomeController::class, 'home'])->name('adminDashboard');
    Route::get('getMyVacations', [UserController::class, 'getVacations'])->name('getMyVacations');

    Route::get('createVacation', [UserController::class, 'createVacation'])->name('createVacation');
    Route::post('storeVacation', [UserController::class, 'storeVacation'])->name('storeVacation');
    Route::get('getMyVacations', [UserController::class, 'getMyVacations'])->name('getMyVacations');

});

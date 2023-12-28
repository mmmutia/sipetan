<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return view('welcome');
});


Route::get('login',[App\Http\Controllers\LoginController::class, 'index'])->name('login');
Route::post('/postlogin',[App\Http\Controllers\LoginController::class, 'postlogin'])->name('postlogin');
Route::get('/logout',[App\Http\Controllers\LoginController::class, 'logout'])->name('logout');
Route::get('/admin/subdistrict', function () { return view('admin/subdistrict'); });


Route::middleware(['auth','ceklevel:admin,user'])->group(function () {
    Route::get('/admin/index',[App\Http\Controllers\IndexAdminController::class, 'index'])->name('/index/admin');
});

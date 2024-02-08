<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\SubsidtrictController;
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
Route::get('/admin/temperature', function () { return view('admin/temperature'); });
Route::get('/admin/altitude', function () { return view('admin/altitude'); });
Route::get('/admin/rainfall', function () { return view('admin/rainfall'); });
Route::get('/admin/humidity', function () { return view('admin/humidity'); });
Route::get('/admin/soil-ph', function () { return view('admin/subdistrict'); });
Route::get('/admin/solar-radiation', function () { return view('admin/subdistrict'); });


Route::middleware(['auth','ceklevel:admin,user'])->group(function () {
    Route::get('/admin/index',[App\Http\Controllers\IndexAdminController::class, 'index'])->name('/index/admin');
    Route::get('/admin/subdistrict',[App\Http\Controllers\SubsidtrictController::class, 'index'])->name('/admin/subdistrict');
    Route::get('/admin/add-subdistrict',[App\Http\Controllers\SubsidtrictController::class, 'create'])->name('/admin/add-subdistrict');
    Route::post('/admin/save-subdistrict',[App\Http\Controllers\SubsidtrictController::class, 'store'])->name('/admin/save-subdistrict');
    Route::get('/admin/edit-subdistrict-{id}',[App\Http\Controllers\SubsidtrictController::class, 'edit'])->name('/admin/edit-subdistrict');
    Route::put('/admin/update-subdistrict-{id}',[App\Http\Controllers\SubsidtrictController::class, 'update'])->name('admin/update-subdistrict');
    Route::get('/admin/delete-subdistrict,{id}',[App\Http\Controllers\SubsidtrictController::class, 'destroy'])->name('admin/delete-subdistrict');
    Route::get('/admin/export-subdistrict',[App\Http\Controllers\SubsidtrictController::class, 'subdistrictexport'])->name('admin/export-subdistrict');
    Route::post('/admin/import-subdistrict',[App\Http\Controllers\SubsidtrictController::class, 'subdistrictimport'])->name('admin/import-subdistrict');
    Route::get('/admin/downloadtemplate-subdistrict',[App\Http\Controllers\SubsidtrictController::class, 'downloadTemplate'])->name('admin/downloadtemplate-subdistrict');

});

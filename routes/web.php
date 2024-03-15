<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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
    return view('user/index');
});
Route::get('/about', function () {
    return view('user/about');
});

Route::get('/plant', function () {
    return view('user/plant');
});

// Route::get('login',[App\Http\Controllers\LoginController::class, 'index'])->name('login');
// Route::post('/postlogin',[App\Http\Controllers\LoginController::class, 'postlogin'])->name('postlogin');
// Route::get('/logout',[App\Http\Controllers\LoginController::class, 'logout'])->name('logout');
Route::get('/admin/temperature', function () { return view('admin/temperature'); });
Route::get('/admin/altitude', function () { return view('admin/altitude'); });
Route::get('/admin/rainfall', function () { return view('admin/rainfall'); });
Route::get('/admin/humidity', function () { return view('admin/humidity'); });
Route::get('/admin/ph-soil', function () { return view('admin/subdistrict'); });
Route::get('/admin/solar-radiation', function () { return view('admin/subdistrict'); });
Route::get('/admin/users', function () { return view('admin/users'); });
Route::get('/admin/kriteria', function () { return view('admin/kriteria'); });
Route::get('/admin/kalkulasi', function () { return view('admin/kalkulasi'); });

// Route::get('/perhitungan', function () { return view('admin/perhitungan'); });
Route::get('/perhitungan',[App\Http\Controllers\SubsidtrictController::class, 'perhitungan'])->name('/admin/perhitungan');
Route::get('/perhitungan',[App\Http\Controllers\SubsidtrictController::class, 'pembagi'])->name('/admin/perhitungan');
Route::post('/save-preverensi', [\App\Http\Controllers\SubsidtrictController::class, 'pembagi'])->name('/hasil');
Route::get('/hasil',[App\Http\Controllers\SubsidtrictController::class, 'hasil'])->name('/admin/hasil');

// Route::get('/perhitungan',[App\Http\Controllers\SubsidtrictController::class, 'terbobot'])->name('/admin/perhitungan');



Route::middleware(['auth', 'ceklevel:0,1'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/admin/subdistrict',[App\Http\Controllers\SubsidtrictController::class, 'index'])->name('/admin/subdistrict');
    Route::get('/admin/alternatif',[App\Http\Controllers\SubsidtrictController::class, 'alternatif'])->name('/admin/alternatif');
    Route::get('/admin/add-subdistrict',[App\Http\Controllers\SubsidtrictController::class, 'create'])->name('/admin/add-subdistrict');
    Route::post('/admin/save-subdistrict',[App\Http\Controllers\SubsidtrictController::class, 'store'])->name('/admin/save-subdistrict');
    Route::get('/admin/edit-subdistrict,{id}',[App\Http\Controllers\SubsidtrictController::class, 'edit'])->name('/admin/edit-subdistrict');
    Route::put('/admin/update-subdistrict,{id}',[App\Http\Controllers\SubsidtrictController::class, 'update'])->name('admin/update-subdistrict');
    Route::get('/admin/delete-subdistrict,{id}',[App\Http\Controllers\SubsidtrictController::class, 'destroy'])->name('admin/delete-subdistrict');
    Route::get('/admin/export-subdistrict',[App\Http\Controllers\SubsidtrictController::class, 'subdistrictexport'])->name('admin/export-subdistrict');
    Route::post('/admin/import-subdistrict',[App\Http\Controllers\SubsidtrictController::class, 'subdistrictimport'])->name('admin/import-subdistrict');
    Route::get('/admin/downloadtemplate-subdistrict',[App\Http\Controllers\SubsidtrictController::class, 'downloadTemplate'])->name('admin/downloadtemplate-subdistrict');


    Route::get('/admin/users',[App\Http\Controllers\UserController::class, 'index'])->name('/admin/users');
    Route::get('/admin/add-users',[App\Http\Controllers\UserController::class, 'create'])->name('/admin/add-users');
    Route::post('/admin/save-users',[App\Http\Controllers\UserController::class, 'store'])->name('/admin/save-users');
    Route::get('/admin/edit-users-{id}',[App\Http\Controllers\UserController::class, 'edit'])->name('/admin/edit-users');
    Route::put('/admin/update-users-{id}',[App\Http\Controllers\UserController::class, 'update'])->name('admin/update-users');
    Route::get('/admin/delete-users-{id}',[App\Http\Controllers\UserController::class, 'destroy'])->name('admin/delete-users');
    Route::get('/admin/export-users',[App\Http\Controllers\UserController::class, 'userexport'])->name('admin/export-users');
    Route::post('/admin/import-users',[App\Http\Controllers\UserController::class, 'humidityimport'])->name('admin/import-users');
    Route::get('/admin/downloadtemplate-users',[App\Http\Controllers\UserController::class, 'downloadTemplate'])->name('admin/downloadtemplate-users');


    Route::get('/admin/kalkulasi',[App\Http\Controllers\KalkulasiController::class, 'index'])->name('/admin/kalkulasi');
    Route::get('/comparison',[App\Http\Controllers\KalkulasiController::class, 'simpanData'])->name('/comparison');
    Route::post('/admin/save-data',[App\Http\Controllers\KalkulasiController::class, 'simpanData'])->name('/admin/save-data');
    Route::get('/hitung-kal',[App\Http\Controllers\KalkulasiController::class, 'pembagi'])->name('/admin/hitung-kal');
    Route::get('/admin/add-kalkulasi',[App\Http\Controllers\KalkulasiController::class, 'create'])->name('/admin/add-kalkulasi');
    Route::post('/admin/save-kalkulasi',[App\Http\Controllers\KalkulasiController::class, 'store'])->name('/admin/save-kalkulasi');
    Route::get('/admin/edit-kalkulasi-{id}',[App\Http\Controllers\KalkulasiController::class, 'edit'])->name('/admin/edit-kalkulasi');
    Route::put('/admin/update-kalkulasi,{id}',[App\Http\Controllers\KalkulasiController::class, 'update'])->name('admin/update-kalkulasi');
    Route::get('/admin/delete-kalkulasi,{id}',[App\Http\Controllers\KalkulasiController::class, 'destroy'])->name('admin/delete-kalkulasi');
    Route::get('/admin/export-kalkulasi',[App\Http\Controllers\KalkulasiController::class, 'userexport'])->name('admin/export-kalkulasi');
    Route::post('/admin/import-kalkulasi',[App\Http\Controllers\KalkulasiController::class, 'humidityimport'])->name('admin/import-kalkulasi');
    Route::get('/admin/downloadtemplate-kalkulasi',[App\Http\Controllers\KalkulasiController::class, 'downloadTemplate'])->name('admin/downloadtemplate-kalkulasi');


    Route::get('/admin/kriteria',[App\Http\Controllers\KriteriaController::class, 'index'])->name('/admin/kriteria');
    Route::get('/admin/add-kriteria',[App\Http\Controllers\KriteriaController::class, 'create'])->name('/admin/add-kriteria');
    Route::post('/admin/save-kriteria',[App\Http\Controllers\KriteriaController::class, 'store'])->name('/admin/save-kriteria');
    Route::get('/admin/edit-kriteria-{id}',[App\Http\Controllers\KriteriaController::class, 'edit'])->name('/admin/edit-kriteria');
    Route::put('/admin/update-kriteria,{id}',[App\Http\Controllers\KriteriaController::class, 'update'])->name('admin/update-kriteria');
    Route::get('/admin/delete-kriteria,{id}',[App\Http\Controllers\KriteriaController::class, 'destroy'])->name('admin/delete-kriteria');
    Route::get('/admin/export-kriteria',[App\Http\Controllers\KriteriaController::class, 'userexport'])->name('admin/export-kriteria');
    Route::post('/admin/import-kriteria',[App\Http\Controllers\KriteriaController::class, 'humidityimport'])->name('admin/import-kriteria');
    Route::get('/admin/downloadtemplate-kriteria',[App\Http\Controllers\KriteriaController::class, 'downloadTemplate'])->name('admin/downloadtemplate-kriteria');


});

Route::middleware(['auth', 'ceklevel:1'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'user'])->name('home');
    // Route::get('/user/home',[App\Http\Controllers\HomeUserController::class, 'index'])->name('/user/home');
});

// Route::resource('profile', UserController::class)->middleware('auth', 'checkRole:user');

Auth::routes();




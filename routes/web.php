<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\HomeUserController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\KalkulasiController;
use App\Http\Controllers\LoginController;
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
    return view('landingpage/index');
});
Route::get('/about', function () {
    return view('landingpage/about');
});

Route::get('/plant', function () {
    return view('landingpage/plant');
});

Route::get('login',[App\Http\Controllers\LoginController::class, 'index'])->name('login');
Route::post('/postlogin',[App\Http\Controllers\LoginController::class, 'postlogin'])->name('postlogin');
Route::get('/logout',[App\Http\Controllers\LoginController::class, 'logout'])->name('logout');
Route::get('/register',[App\Http\Controllers\LoginController::class, 'register'])->name('register');
Route::post('/simpanregistrasi',[App\Http\Controllers\LoginController::class, 'simpanregistrasi'])->name('simpanregistrasi');


Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeUserController::class, 'index'])->name('home');
    Route::get('/comparison',[App\Http\Controllers\KalkulasiController::class, 'comparison'])->name('/comparison');
    Route::get('/print-comparison',[App\Http\Controllers\KalkulasiController::class, 'printcomparison'])->name('/print-comparison');
    Route::get('/profile', [App\Http\Controllers\UserController::class, 'profile'])->name('profile');
    Route::get('/edit-profile',[App\Http\Controllers\UserController::class, 'edit'])->name('/edit-profile');
    Route::post('/update-profile', [App\Http\Controllers\UserController::class, 'update'])->name('update-profile');

});

Route::middleware(['auth', 'ceklevel:admin'])->group(function () {

    Route::get('/alternatif',[App\Http\Controllers\SubsidtrictController::class, 'alternatif'])->name('/alternatif');
    Route::get('/add-subdistrict',[App\Http\Controllers\SubsidtrictController::class, 'create'])->name('/add-subdistrict');
    Route::post('/save-subdistrict',[App\Http\Controllers\SubsidtrictController::class, 'store'])->name('/save-subdistrict');
    Route::get('/edit-subdistrict,{id}',[App\Http\Controllers\SubsidtrictController::class, 'edit'])->name('/edit-subdistrict');
    Route::post('/update-subdistrict,{id}',[App\Http\Controllers\SubsidtrictController::class, 'update'])->name('/update-subdistrict');
    Route::delete('/delete-subdistrict,{id}',[App\Http\Controllers\SubsidtrictController::class, 'delete'])->name('/delete-subdistrict');
    Route::get('/export-subdistrict',[App\Http\Controllers\SubsidtrictController::class, 'subdistrictexport'])->name('/export-subdistrict');
    Route::post('/import-subdistrict',[App\Http\Controllers\SubsidtrictController::class, 'subdistrictimport'])->name('/import-subdistrict');
    Route::get('/downloadtemplate-subdistrict',[App\Http\Controllers\SubsidtrictController::class, 'downloadTemplate'])->name('/downloadtemplate-subdistrict');
    Route::resource('/admin/subdistrict', SubsidtrictController::class);
    Route::get('/delete-all-data', [SubsidtrictController::class, 'deleteAllData'])->name('delete.all.data');

    Route::get('/perhitungan',[App\Http\Controllers\SubsidtrictController::class, 'perhitungan'])->name('/admin/perhitungan');
    Route::get('/perhitungan',[App\Http\Controllers\SubsidtrictController::class, 'pembagi'])->name('/admin/perhitungan');
    Route::post('/save-preverensi', [\App\Http\Controllers\SubsidtrictController::class, 'pembagi'])->name('/hasil');
    Route::get('/hasil',[App\Http\Controllers\SubsidtrictController::class, 'hasil'])->name('/admin/hasil');


    Route::get('/users',[App\Http\Controllers\UserController::class, 'index'])->name('/users');
    Route::get('/add-users',[App\Http\Controllers\UserController::class, 'create'])->name('/add-users');
    Route::post('/save-users',[App\Http\Controllers\UserController::class, 'store'])->name('/save-users');
    Route::get('/edit-users-{id}',[App\Http\Controllers\UserController::class, 'edit'])->name('/edit-users');
    Route::post('/update-users-{id}',[App\Http\Controllers\UserController::class, 'update'])->name('/update-users');
    Route::get('/delete-users,{id}',[App\Http\Controllers\UserController::class, 'destroy'])->name('/delete-users');
    Route::get('/export-users',[App\Http\Controllers\UserController::class, 'userexport'])->name('/export-users');
    Route::post('/import-users',[App\Http\Controllers\UserController::class, 'humidityimport'])->name('/import-users');
    Route::get('/downloadtemplate-users',[App\Http\Controllers\UserController::class, 'downloadTemplate'])->name('/downloadtemplate-users');


    Route::get('/kalkulasi',[App\Http\Controllers\KalkulasiController::class, 'index'])->name('/kalkulasi');

    Route::post('/save-data',[App\Http\Controllers\KalkulasiController::class, 'simpanData'])->name('/save-data');
    Route::get('/del-kal', [KalkulasiController::class, 'deleteKal'])->name('delete.kal');
    Route::get('/hitung-kal',[App\Http\Controllers\KalkulasiController::class, 'pembagi'])->name('/hitung-kal');
    Route::get('/add-kalkulasi',[App\Http\Controllers\KalkulasiController::class, 'create'])->name('/add-kalkulasi');
    Route::post('/save-kalkulasi',[App\Http\Controllers\KalkulasiController::class, 'store'])->name('/save-kalkulasi');
    Route::get('/edit-kalkulasi,{id}',[App\Http\Controllers\KalkulasiController::class, 'edit'])->name('/edit-kalkulasi');
    Route::post('/update-kalkulasi,{id}',[App\Http\Controllers\KalkulasiController::class, 'update'])->name('/update-kalkulasi');
    Route::delete('/delete-kalkulasi,{id}',[App\Http\Controllers\KalkulasiController::class, 'delete'])->name('/delete-kalkulasi');
    Route::get('/export-kalkulasi',[App\Http\Controllers\KalkulasiController::class, 'userexport'])->name('/export-kalkulasi');
    Route::post('/import-kalkulasi',[App\Http\Controllers\KalkulasiController::class, 'humidityimport'])->name('/import-kalkulasi');
    Route::get('/downloadtemplate-kalkulasi',[App\Http\Controllers\KalkulasiController::class, 'downloadTemplate'])->name('/downloadtemplate-kalkulasi');


    Route::get('/kriteria',[App\Http\Controllers\KriteriaController::class, 'index'])->name('/kriteria');
    Route::get('/edit-kriteria,{id}',[App\Http\Controllers\KriteriaController::class, 'edit'])->name('/edit-kriteria');
    Route::get('/add-kriteria',[App\Http\Controllers\KriteriaController::class, 'create'])->name('/add-kriteria');
    Route::post('/save-kriteria',[App\Http\Controllers\KriteriaController::class, 'store'])->name('/save-kriteria');
    Route::post('/update-kriteria,{id}',[App\Http\Controllers\KriteriaController::class, 'update'])->name('/update-kriteria');
    Route::delete('/delete-kriteria,{id}',[App\Http\Controllers\KriteriaController::class, 'delete'])->name('/delete-kriteria');
    Route::get('/export-kriteria',[App\Http\Controllers\KriteriaController::class, 'userexport'])->name('/export-kriteria');
    Route::post('/import-kriteria',[App\Http\Controllers\KriteriaController::class, 'humidityimport'])->name('/import-kriteria');
    Route::get('/downloadtemplate-kriteria',[App\Http\Controllers\KriteriaController::class, 'downloadTemplate'])->name('/downloadtemplate-kriteria');
    Route::resource('/kriteria', KriteriaController::class);


});

Route::middleware(['auth', 'ceklevel:user'])->group(function () {
   ;
});







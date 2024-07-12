<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AlternatifController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DataPerhitunganController;
use App\Http\Controllers\HasilAkhirController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KriteriaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubKriteriaController;
use App\Http\Controllers\SubKriteriaController1;
use App\Http\Controllers\SubKriteriaController2;
use App\Http\Controllers\SubKriteriaController3;
use App\Http\Controllers\SubKriteriaController4;
use App\Models\Penilaian;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\RekomendasiController;

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

Route::controller(AuthController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('register.save');

    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');

    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});

Route::middleware(['auth', 'user-access:user'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/about', [AboutController::class, 'index'])->name('about');
    Route::get('/rekomendasi', [RekomendasiController::class, 'index'])->name('index');
    Route::post('/rekomendasi/submit', [RekomendasiController::class, 'submit'])->name('submit.rekomendasi');
   
});

Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin/home');

    Route::get('/admin/profile', [AdminController::class, 'profilepage'])->name('admin/profile');

    Route::get('/admin/kriterias', [KriteriaController::class, 'index'])->name('admin/kriterias');
    Route::get('/admin/kriterias/create', [KriteriaController::class, 'create'])->name('admin/kriterias/create');
    Route::post('/admin/kriterias/store', [KriteriaController::class, 'store'])->name('admin/kriterias/store');
    Route::get('/admin/kriterias/show/{id}', [KriteriaController::class, 'show'])->name('admin/kriterias/show');
    Route::get('/admin/kriterias/edit/{id}', [KriteriaController::class, 'edit'])->name('admin/kriterias/edit');
    Route::put('/admin/kriterias/edit/{id}', [KriteriaController::class, 'update'])->name('admin/kriterias/update');
    Route::delete('/admin/kriterias/destroy/{id}', [KriteriaController::class, 'destroy'])->name('admin/kriterias/destroy');


    Route::get('/admin/alternatif', [AlternatifController::class, 'index'])->name('admin/alternatif');
    Route::get('/admin/alternatif/create', [AlternatifController::class, 'create'])->name('admin/alternatif/create');
    Route::post('/admin/alternatif/store', [AlternatifController::class, 'store'])->name('admin/alternatif/store');
    Route::get('/admin/alternatif/show/{id}', [AlternatifController::class, 'show'])->name('admin/alternatif/show');
    Route::get('/admin/alternatif/edit/{id}', [AlternatifController::class, 'edit'])->name('admin/alternatif/edit');
    Route::put('/admin/alternatif/edit/{id}', [AlternatifController::class, 'update'])->name('admin/alternatif/update');
    Route::delete('/admin/alternatif/destroy/{id}', [AlternatifController::class, 'destroy'])->name('admin/alternatif/destroy');
    
    Route::get('/admin/subkriteria', [SubKriteriaController::class, 'index'])->name('admin/subkriteria');
    Route::get('/admin/subkriteria/create', [SubKriteriaController::class, 'create'])->name('admin/subkriteria/create');
    Route::post('/admin/subkriteria', [SubKriteriaController::class, 'store'])->name('admin/subkriteria/store');
    Route::get('/admin/subkriteria/{subKriteria}', [SubKriteriaController::class, 'show'])->name('admin/subkriteria/show');
    Route::get('/admin/subkriteria/{subKriteria}/edit', [SubKriteriaController::class, 'edit'])->name('admin/subkriteria/edit');
    Route::put('/admin/subkriteria/{subKriteria}', [SubKriteriaController::class, 'update'])->name('admin/subkriteria/update');
    Route::delete('/admin/subkriteria/{subKriteria}', [SubKriteriaController::class, 'destroy'])->name('admin/subkriteria/destroy');

    Route::get('/admin/penilaian', [PenilaianController::class, 'index'])->name('admin/penilaian');
    Route::get('/admin/penilaian/create', [PenilaianController::class, 'create'])->name('admin/penilaian/create');
    Route::post('/admin/penilaian/store', [PenilaianController::class, 'store'])->name('admin/penilaian/store');
    Route::get('/admin/penilaian/edit/{id}', [PenilaianController::class, 'edit'])->name('admin/penilaian/edit');
    Route::put('/admin/penilaian/update/{id}', [PenilaianController::class, 'update'])->name('admin/penilaian/update');
    Route::delete('/admin/penilaian/destroy/{id}', [PenilaianController::class, 'destroy'])->name('admin/penilaian/destroy');
    
    Route::get('admin/perhitungan', [DataPerhitunganController::class, 'hitung'])->name('admin/perhitungan');
    Route::get('/perhitungan', [DataPerhitunganController::class, 'showPerhitungan'])->name('perhitungan.index');


    Route::get('admin/hasil_akhir', [HasilAkhirController::class, 'hitung'])->name('admin/hasil_akhir');
});

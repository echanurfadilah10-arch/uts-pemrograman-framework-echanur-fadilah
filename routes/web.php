<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthControllerEchanurFadilah;
use App\Http\Controllers\DashboardControllerEchanurFadilah;
use App\Http\Controllers\PelajaranControllerEchanurFadilah;
use App\Http\Controllers\SiswaControllerEchanurFadilah;
use App\Http\Controllers\KurikulumControllerEchanurFadilah;
use App\Http\Controllers\KelasControllerEchanurFadilah;
use App\Http\Controllers\JadwalControllerEchanurFadilah;
use App\Http\Controllers\NilaiControllerEchanurFadilah;

Route::get('/login', [AuthControllerEchanurFadilah::class, 'showLogin'])->name('login')->middleware('guest');
Route::post('/login', [AuthControllerEchanurFadilah::class, 'login'])->middleware('guest');
Route::post('/logout', [AuthControllerEchanurFadilah::class, 'logout'])->name('logout')->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::get('/', fn () => redirect('/dashboard'));
    Route::get('/dashboard', [DashboardControllerEchanurFadilah::class, 'index'])->name('dashboard');

    Route::resource('siswa', SiswaControllerEchanurFadilah::class)->except('show');
    Route::resource('pelajaran', PelajaranControllerEchanurFadilah::class)->except('show');
    Route::resource('kurikulum', KurikulumControllerEchanurFadilah::class)->except('show');
    Route::resource('kelas', KelasControllerEchanurFadilah::class)->except('show');
    Route::resource('jadwal', JadwalControllerEchanurFadilah::class)->except('show');
    Route::resource('nilai', NilaiControllerEchanurFadilah::class)->except('show');
});
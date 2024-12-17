<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AlumniController;
use App\Http\Controllers\PublicController;

Route::get('/', function () {
    return view('landing_page');
})->name('landingPage');


Route::get('/alumni-form', [AlumniController::class, 'alumni_form'])->name('alumniForm');
Route::post('/alumni/store', [AlumniController::class, 'store'])->name('alumni.store');
Route::get('/profile/{id}', [AlumniController::class, 'show'])->name('profile');
Route::delete('/alumni/{id}', [AlumniController::class, 'destroy'])->name('alumni.destroy');



Route::post('/register', [AdminController::class, 'register'])->name('register');
Route::post('/login', [AdminController::class, 'login'])->name('login');
Route::get('/admin-register', [AdminController::class, 'register_form'])->name('admin.register.form');
Route::get('/admin-login', [AdminController::class, 'login_form'])->name('admin.login');
Route::get('/admin-dashboard', [AdminController::class, 'admin_dashboard'])->name('admin.dashboard');
Route::get('/admin-bsit', [AdminController::class, 'admin_bsit'])->name('admin.bsit.index');
Route::get('/admin-bshm', [AdminController::class, 'admin_bshm'])->name('admin.bshm.index');
Route::get('/admin-beed', [AdminController::class, 'admin_bsba'])->name('admin.bsba.index');
Route::get('/admin-bsba', [AdminController::class, 'admin_beed'])->name('admin.beed.index');
Route::get('/manage-acount', [AdminController::class, 'manage_account'])->name('admin.manage.account');
Route::get('/admin-settings', [AdminController::class, 'settings'])->name('admin.settings');
Route::post('/logout', [AdminController::class, 'logout'])->name('logout');
Route::delete('/admin/{id}', [AdminController::class, 'destroy'])->name('user.destroy');



Route::get('/public-dashboard', [PublicController::class, 'public_dashboard'])->name('public.dashboard');
Route::get('/public-bsit', [PublicController::class, 'public_bsit'])->name('public.bsit.index');
Route::get('/public-bshm', [PublicController::class, 'public_bshm'])->name('public.bshm.index');
Route::get('/public-beed', [PublicController::class, 'public_bsba'])->name('public.bsba.index');
Route::get('/public-bsba', [PublicController::class, 'public_beed'])->name('public.beed.index');
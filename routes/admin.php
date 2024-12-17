<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\AuthController;

// Admin Giriş Rotası
Route::get('/admin/login', [AuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AuthController::class, 'login'])->name('admin.login.post');
Route::post('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');

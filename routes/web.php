<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'dashboard'])->name('dashboard');
Route::get('/tables', [App\Http\Controllers\Admin\TablesController::class, 'tables'])->name('tables');
// Blog
Route::get('/', [App\Http\Controllers\Blog\HomeController::class, 'home'])->name('home');
Route::get('/about', [App\Http\Controllers\Blog\AboutController::class, 'about'])->name('about');
Route::get('/news', [App\Http\Controllers\Blog\NewsController::class, 'news'])->name('news');

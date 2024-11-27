<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'dashboard'])->name('dashboard');
Route::get('/home_table', [App\Http\Controllers\Admin\TablesController::class, 'home_table'])->name('home_table');
Route::get('/news_table', [App\Http\Controllers\Admin\TablesController::class, 'news_table'])->name('news_table');

Route::get('/about_table', [App\Http\Controllers\Admin\TablesController::class, 'about_table'])->name('about_table');
Route::post('/about_table', [App\Http\Controllers\Admin\TablesController::class, 'add_about'])->name('add.about');
Route::get('/about/{id}/edit_about', [App\Http\Controllers\Admin\TablesController::class, 'edit_about'])->name('edit.about');
Route::delete('/about/{id}', [App\Http\Controllers\Admin\TablesController::class, 'delete_about'])->name('delete.about');

// Blog
Route::get('/', [App\Http\Controllers\Blog\HomeController::class, 'home'])->name('home');
Route::get('/about', [App\Http\Controllers\Blog\AboutController::class, 'about'])->name('about');
Route::get('/news', [App\Http\Controllers\Blog\NewsController::class, 'news'])->name('news');
Route::get('/contact', [App\Http\Controllers\Blog\ContactController::class, 'contact'])->name('contact');

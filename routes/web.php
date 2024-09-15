<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('frontend.blogs.index');
})->name('index');

Route::prefix('admin')->group(function () {
    Route::view('dashboard', 'backend.admin.blogs.create');
})->name('admin.');
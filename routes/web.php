<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('frontend.blogs.index');
})->name('index');

Route::get('admin/dashboard', function () {
    return view('backend.admin.dashboard');
});
<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('frontend.blogs.index');
})->name('index');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::prefix('blogs')->name('blogs.')->group(function () {
        Route::view('create', 'backend.admin.blogs.create')->name('create');
        Route::view('edit/{id}', 'backend.admin.blogs.edit')->name('edit');
        Route::view('view', 'backend.admin.blogs.view')->name('view');
    });
});
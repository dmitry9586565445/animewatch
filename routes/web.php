<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::namespace('App\Http\Controllers')->group(function () {
    Route::namespace('Main')->group(function () {
        Route::get('/', 'IndexController')->name('index');
        Route::get('/search', 'SearchController')->name('search');

        Route::controller('MaterialController')->name('material.')->prefix('material')->group(function () {
            Route::middleware('permission:add-material')->group(function () {
                Route::get('/create', 'create')->name('create');
                Route::post('/store', 'store')->name('store');
            });
        });
    });
});

Auth::routes();

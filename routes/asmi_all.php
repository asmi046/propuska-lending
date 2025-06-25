<?php

use App\Http\Controllers\CheckController;
    use Illuminate\Support\Facades\Route;

    use App\Http\Controllers\IndexController;

    Route::get('/', [IndexController::class, "index"])->name('home');
    Route::get('/page/{slug}', [PageController::class, "index"])->name('page');

    Route::get('/pass_check', [CheckController::class, "index"])->name('pass_check');

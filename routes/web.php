<?php

use App\Http\Controllers\SkinController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/skins', [SkinController::class, 'index'])->name('skin.index');
Route::get('/skins/add', [SkinController::class, 'create'])->name('skin.create');
Route::post('/skins', [SkinController::class, 'store'])->name('skin.store');

<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SkinController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\IsAdmin;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/skins/add', [SkinController::class, 'create'])->name('skin.create'); //this one has to be here or else it doesn't work

Route::get('/skins', [SkinController::class, 'index'])->name('skin.index');
Route::get('/skins/{id}', [SkinController::class, 'show'])->name('skin.show');
Route::get('/skins/{id}/download', [SkinController::class, 'download'])->name('skin.download');

Route::get('/tags', [TagController::class, 'index'])->name('tags.index');


Route::middleware(['auth', 'is_admin'])->group(function () {
    Route::post('/skins', [SkinController::class, 'store'])->name('skin.store');
    Route::get('/skins/{id}/edit', [SkinController::class, 'edit'])->name('skin.edit');
    Route::put('/skins/{id}', [SkinController::class, 'update'])->name('skin.update');
    Route::delete('/skins/{id}', [SkinController::class, 'destroy'])->name('skin.destroy');
});




require __DIR__.'/auth.php';

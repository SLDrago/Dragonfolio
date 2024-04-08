<?php

use App\Http\Controllers\ContactMeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;


Route::get('/', [ProjectController::class, 'index']);

Route::post('/sendmail', [ContactMeController::class, 'sendEmail'])->name('sendEmail');

Route::get('/dashboard', [ProjectController::class, 'showProjects'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

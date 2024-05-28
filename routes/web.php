<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\CharacterController;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
    Route::resource('characters', CharacterController::class);
    Route::post('/characters/{character}/edit', [CharacterController::class, 'update'])->name('characters.update');

    Route::get('/characters/{character}/skills', [CharacterController::class, 'editSkill'])->name('characters.skills.edit');
    Route::post('/characters/{character}/skills', [CharacterController::class, 'storeSkill'])->name('characters.skills.store');

    Route::get('/characters/{character}/traits', [CharacterController::class, 'editTrait'])->name('characters.traits.edit');
    Route::post('/characters/{character}/traits', [CharacterController::class, 'storeTrait'])->name('characters.traits.store');

    Route::get('/characters/{character}/attributes', [CharacterController::class, 'editAttribute'])->name('characters.attributes.edit');
    Route::post('/characters/{character}/attributes', [CharacterController::class, 'storeAttribute'])->name('characters.attributes.store');

    Route::post('/characters/{character}/notes', [CharacterController::class, 'updateNotes'])->name('characters.notes.update');

});

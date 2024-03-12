<?php

use App\Models\Note;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});



Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('note', NoteController::class);
    // Route::get('/trash-note', [NoteController::class, 'trash'])->name('trash.note');

    Route::get('/trash-note', function () {
    $trashCount = Note::onlyTrashed()->count();
        return view('note.trash-note', compact('trashCount'));
    })->name('trash.note');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

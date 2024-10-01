<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [BookController::class, 'index'])->name('Book.index');
Route::get('/books/{id}/show', [BookController::class, 'show'])->name('Book.show');
Route::get('/books/create', [BookController::class, 'create'])->name('Book.create');
Route::post('/books', [BookController::class, 'store'])->name('Book.store');
Route::delete('/books/{id}/delete', [BookController::class, 'destroy'])->name('Book.destroy');

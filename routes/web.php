<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BorrowerController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowedBookController;
use App\Http\Controllers\AuthController;

// Public routes
Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Apply authentication middleware to the following routes
Route::middleware('auth')->group(function () {
    Route::get('/home', [BookController::class, 'index'])->name('home');
    
   // Show the list of borrowers
   Route::get('/borrowers', [BorrowerController::class, 'index'])->name('borrowers.index');
    
   // Store a new borrower
   Route::post('/borrowers', [BorrowerController::class, 'store'])->name('borrowers.store');
   
   // Delete a borrower
   Route::delete('/borrowers/{id}', [BorrowerController::class, 'destroy'])->name('borrowers.destroy');
   
    Route::get('/books', [BookController::class, 'index'])->name('books.index');
    Route::post('/books', [BookController::class, 'store'])->name('books.store');
    
    Route::post('/assign', [BookController::class, 'assign'])->name('books.assign');
    Route::delete('/remove-assignment/{id}', [BookController::class, 'removeAssignment'])->name('books.removeAssignment');

    Route::get('/borrowed-books', [BorrowedBookController::class, 'index'])->name('borrowed_books.index');
    Route::post('/borrowed-books', [BorrowedBookController::class, 'store'])->name('borrowed_books.store');
});

// Laravel default authentication routes
Auth::routes();

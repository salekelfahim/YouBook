<?php

use App\Http\Controllers\BookController;
use App\Models\Book;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [BookController::class , 'ShowBooks'])->name('show');

Route::get('/addbook', function () {
    return view('addbook');
});

Route::post('/addbook', [BookController::class , 'addBook'])->name('addBook');

Route::get('/bookslist', [BookController::class , 'ShowBookslist'])->name('show');

Route::delete('/delete/{id}' , [BookController::class , 'delete'])->name('delete.book');

Route::get('/books/{id}', [BookController::class, 'showDetails'])->name('book.details');



Route::get('/edit/{id}', [BookController::class, 'edit'])->name('edit.book');
Route::put('/update/{id}', [BookController::class, 'update'])->name('update.book');


Route::post('/reserve/{id}', [BookController::class, 'reserveBook'])->name('reserve.book');
Route::get('/reservations', [BookController::class, 'reservedBooks'])->name('reservations');
Route::post('/unreserve/{id}', [BookController::class, 'unreserveBook'])->name('unreserve.book');


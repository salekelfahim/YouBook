<?php

use App\Http\Controllers\BookController;
use App\Models\Book;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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

Route::get('/addbook', [BookController::class , 'ShowAddBooks']);

Route::post('/addbook', [BookController::class , 'addBook'])->name('addBook');

Route::get('/bookslist', [BookController::class , 'ShowBookslist'])->name('bookslist');

Route::delete('/delete/{id}' , [BookController::class , 'delete'])->name('delete.book');

Route::get('/books/{id}', [BookController::class, 'showDetails'])->name('book.details');



Route::get('/edit/{id}', [BookController::class, 'edit'])->name('edit.book');
Route::put('/upgdate/{id}', [BookController::class, 'update'])->name('update.book');


Route::post('/reserve/{id}', [BookController::class, 'reserveBook'])->name('reserve.book');
Route::get('/reservations', [BookController::class, 'reservedBooks'])->name('reservations');
Route::post('/unreserve/{id}', [BookController::class, 'unreserveBook'])->name('unreserve.book');


Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class,'register']);


Route::get('/login', [AuthController::class,'showLogin'])->name('login');
Route::post('/login', [AuthController::class,'login']);


Route::post('/logout', [AuthController::class,'logout'])->name('logout');



<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvbooker within a group which
| contains the "web" mbookdleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('books',[BookController::class,'index'])->name('books.index');
Route::get('books/{id}', [BookController::class, 'show'])->name('books.Show');
Route::get('books/create', [BookController::class, 'create'])->name('books.create');
Route::post('books', [BookController::class, 'store'])->name('books.store');
Route::get('books/{id}/edit', [BookController::class, 'edit'])->name('books.edit');
Route::put('books/{id}', [BookController::class, 'update'])->name('books.update');
Route::delete('books/{id}', [BookController::class, 'delete'])->name('books.delete');

// Route::resource('books',BookController::class);
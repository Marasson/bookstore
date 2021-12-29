<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
 
Route::get('/', function () {
    return view('welcome');
});

Route::get('books', [BookController::class,'index'])->name('books.index');

Route::get('/books', function () {
    return view('books');
})->middleware(['auth'])->name('books');

Route::get('/booksvue', function () {
    return view('booksvue');
})->middleware(['auth'])->name('booksvue');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
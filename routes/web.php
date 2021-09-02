<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;

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

/*Route::get('/', function () {
    return view('welcome');
});
*/

/*Route::get('/', [UserController::class, 'index'])->name('home');
Route::get('/author', [UserController::class, 'author'])->name('author');
Route::get('/publisher', [UserController::class, 'publisher'])->name('publisher');
Route::get('/about', [UserController::class, 'about'])->name('about');
Route::get('/contact', [UserController::class, 'contact'])->name('contact');
Route::get('/tugas', [UserController::class, 'tugas'])->name('tugas');

Route::post('/send-buah', [UserController::class, 'comment'])->name('buah');
*/

Route::get('/', [ProductController::class, 'index'])->middleware('auth');
Route::get('/home', [ProductController::class, 'index'])->middleware('auth');
Route::resource('products', ProductController::class)->middleware('auth');

Route::get('login', [UserController::class, 'login'])->name('login')->middleware('guest');
Route::post('login', [UserController::class, 'processLogin']);
Route::get('logout', [UserController::class, 'logout']);
Route::get('upload-image/{id}', [ProductController::class, 'upload'])->middleware('auth');

/*
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('products/create');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');
Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
*/
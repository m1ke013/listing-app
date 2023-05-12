<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;

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
Auth::routes();
Route::get('/', function () {
    return view('home');
});

Route::resource('/products', 
    ProductController::class
);

Route::get('/create', function () {
    return view('products.add_product');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/',[HomeController::class, 'index'])->name('home');


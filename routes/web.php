<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;


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

Route::get('/', function () {
    return view('login.login');
});

Route::resource('/products', 
    ProductController::class
);

Route::get('/create', function () {
    return view('products.add_product');
});

// Login  and Register
Route::get('/login', function () {
    return view('login.login');
});


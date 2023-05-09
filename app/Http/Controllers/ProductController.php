<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $product = "Product Lists";
        return view('products.index',['products' => $product]);
    }
}

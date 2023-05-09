<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use App\Models\Product;




class ProductController extends Controller
{
    public function index(){ 
        $product = Product::orderby('create_at')->get();
        // return view('products.index',['products' => $product]);
        return view('products.index', ['products' => $products]);


    }

    public function selectProduct(): View
    {
        // $products = DB::select('select * from products where status = ?', [1]);
        $products = Product::orderby('id')->get();
        // foreach ($products as $product) {
        //     $prod_array[] = array(
        //         "name"  => $product->name,
        //         "description"  => $product->description,
        //         "category"  => $product->category,
        //         "quantity"  => $product->quantity,
        //         "status"  => $product->status
        //     );
        // }
 
        return view('products.index', ['products' => $products]);

    }
}

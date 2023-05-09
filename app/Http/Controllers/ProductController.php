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
        return view('products.index', ['products' => $products]);
    }

    public function insertProduct(Request $request){

        $product = new Product;
        $product->name = $request->name;
        $product->decription = $request->decription;
        $product->price = $request->price;
        $product->category = $request->category;
        $product->status = $request->status;

        $product->save();
        return redirect()->route('products.index')->with('success','Product Added');
    }
}

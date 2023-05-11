<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use App\Models\Product;




class ProductController extends Controller
{
    public function index(Request $request){ 
        $keyword = $request->get('search');
        // $page = 10;
        if(!empty($keyword)){
            $data = Product::where('status',0)
            ->orwhere('status',NULL)
            ->orwhere('name','LIKE','%$keyword%')
            ->orwhere('category','LIKE','%$keyword%')
            ->get();
        }else{
            $data = Product::where('status',0)
            ->orwhere('status',NULL)->get();
        }

        return view('products.index', ['products' => $data]);


    }

    public function create(){
        return view('products.add_product');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'description' => 'required'
        ]);

        $product = new Product;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->category = $request->category;
        $product->status = $request->status;

        $product->save();
        return redirect()->route('products.index')->with('success','Product Added');
    }

    public function edit($id){
        $product = Product::findOrFail($id);
        return view('products.edit_product',['product'=>$product]);
    }


    public function update(Request $request, Product $product){
        $request->validate([
            'name' => 'required',
            'description' => 'required'
        ]);

        $product = Product::find($product->id);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->category = $request->category;
        $product->status = 0;
        $product->save();
        return redirect()->route('products.index')->with('success','Product has been updated successfully');
    }

    public function destroy($id){
        // 0 and NULL - new
        // 1 - delete
        $product = Product::findOrFail($id);
        $product->status = '1';
        $product->save();
        return redirect('products')->with('success','Product has been deleted successfully');
    }

    

}

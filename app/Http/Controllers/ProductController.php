<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use App\Models\Product;




class ProductController extends Controller
{
    public function index(Request $request){ 
        $keyword = trim($request->get('search'));
        $page = 4;
        if(!empty($keyword)){
            $data = Product::where('name','like',"%$keyword%")
            ->orWhere('description','like',"%$keyword%")
            ->where('status',0)
            ->get();
            // ->latest()->paginate($page);
        }else{
            $data =  Product::where('status',0)
            ->get();
            // ->latest()->paginate($page);
        }
        return view('products.index', ['products' => $data]);


    }

    public function create(){
        return view('products.add_product');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg,gif'
        ]);

        // Select a image
        // $image = "test.png";
        $image = time() .'.'. request()->image->getClientOriginalExtension();
        request()->image->move(public_path('images'),$image);

        $product = new Product;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->category = $request->category;
        $product->image = $image;
        $product->status = 0;

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
            'description' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg,gif'
        ]);
        $image = time() .'.'. request()->image->getClientOriginalExtension();
        request()->image->move(public_path('images'),$image);

        $product = Product::find($product->id);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->category = $request->category;
        $product->image = $image;
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

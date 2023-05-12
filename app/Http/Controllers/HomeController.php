<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
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
}

<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Http\Requests\StoreproductRequest;
use App\Http\Requests\UpdateproductRequest;
use App\Models\category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('category')->get();
        $role = Auth::user()->role;
        return view('pages.product', ['product' => $products, 'role' => $role]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function create()
    {
        $role = Auth::user()->role;

        if($role === 'admin'){
            $categories = category::all();
        return view('pages.create', ['category' => $categories]);
        } else{
            return view('pages.denied');
        }
    }
    public function store(StoreproductRequest $request)
    {
        $role = Auth::user()->role;
        
        if($role === 'admin'){

            $validate = $request->validated();
    
            $data = new product;
            $data->product_name = $request->product_name;
            $data->product_code = $request->product_code;
            $data->category_id = $request->category_id;
            $data->price = $request->price;
            $data->stock = $request->stock;
            $data->description = $request->description;
            $data->save();
    
            return redirect('product')->with('msg', 'produk telah ditambahkan');
        } else{
            return view('pages.denied');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $role = Auth::user()->role;

        if($role === 'admin'){

            $data = Product::with('category')->findOrFail($id);
            $categories = Category::all();
    
            return view('pages.update')->with([
                'id' => $id,
                'product_name' => $data->product_name,
                'product_code' => $data->product_code,
                'category_id' => $data->category->id, // Gunakan id kategori daripada category_name
                'price' => $data->price,
                'stock' => $data->stock,
                'description' => $data->description,
                'categories' => $categories,
            ]);
        }else{
            return view('pages.denied');
        }
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateproductRequest $request, $id)
    {
        $role = Auth::user()->role;
        if($role === 'admin'){
            
            $data = Product::findOrFail($id);
            $data->product_name = $request->product_name;
            $data->product_code = $request->product_code;
            $data->category_id = $request->category_id;
            $data->price = $request->price;
            $data->stock = $request->stock;
            $data->description = $request->description;
            $data->save();
    
            return redirect('product')->with('msg', 'produk telah diupdate');
        }else{
            return view('pages.denied');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {   
        $role = Auth::user()->role;
        if($role === 'admin'){

            $data = Product::find($id);
            $data->delete();
            return redirect('product')->with('msg', 'produk telah dihapus');
        }else{
            return view('pages.denied');
        }
    }
    
   public function chart()
	{

		$totalProducts = Product::count();
		$totalCategories = Category::count();
		$totalPrice = Product::sum('price');
		$totalStock = Product::sum('stock');

        $productCategories = DB::table('products')
        ->select('category_id', DB::raw('count(*) AS total_products'), DB::raw('SUM(price) AS total_price'),
        DB::raw('SUM(stock) AS total_stock'))
        ->groupBy('category_id')
        ->get();

        $categories = $productCategories->pluck('category_id')->toArray();
        $totalStocks = $productCategories->pluck('total_stock')->toArray();
		
		return view('pages.chart', compact('totalProducts', 'totalCategories', 'totalPrice', 'totalStock', 'categories', 'totalStocks' ));
	}
}


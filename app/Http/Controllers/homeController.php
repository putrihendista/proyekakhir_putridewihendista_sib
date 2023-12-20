<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
use App\Models\product;

class HomeController extends Controller
{
    public function index()
    {
        $totalProducts = product::count();
        $totalCategories = category::count();
        $totalPrice = Product::sum('price');
        $totalStock = Product::sum('stock');

        return view('pages.dashboard', compact('totalProducts', 'totalCategories', 'totalPrice', 'totalStock'));
    }

}
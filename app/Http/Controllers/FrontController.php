<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class FrontController extends Controller
{
    public function index()
    {
        $Topproducts = Product::where('is_featured', 'Yes')
            ->where('status', 1)
            ->with('productImages')
            ->get();

        $Products = Product::where('status',1)->get();

        $data['topproducts'] = $Topproducts;
        $data['products'] = $Products;

        return view('front.home', $data);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
    public function product($slug){
        $product = Product::where('slug',$slug)->with('productImages')->first();
        if($product == null){
            abort(404);
        }
        $relatedProduct = Product::where('district',$product->district)
        ->where('id', '!=', $product->id) 
        ->with('productImages')
        ->get();
        $data['product'] = $product;
        $data['related'] = $relatedProduct;
        return view('front.product',$data);
    }
    
}

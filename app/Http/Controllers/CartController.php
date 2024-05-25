<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    
    public function index()
    {
        $cart = Session::get('cart', []);
        return view('front.cart', compact('cart'));
    }

    
    public function addToCart($id)
    {
        $product = Product::findorfail($id);
        $productId = $product->id;
        $quantity = 1;
        $productName = $product->title;
        $productPrice = $product->price;

        $cart = Session::get('cart', []);

        // Check if the item already exists in the cart
        if (array_key_exists($productId, $cart)) {
            $cart[$productId]['quantity'] += $quantity;
            $cart[$productId]['total'] = $cart[$productId]['quantity'] * $cart[$productId]['price'];
        } else {
            // Add the new item to the cart
            $cart[$productId] = [
                'product_id' => $productId,
                'product_name' => $productName,
                'price' => $productPrice,
                'quantity' => $quantity,
                'total' => $productPrice * $quantity
            ];
        }

        Session::put('cart', $cart);

        return redirect()->back()->with('success', 'Item added to cart successfully.');
    }

    
    public function updateCartItem(Request $request)
{
    $productId = $request->input('product_id');
    $operation = $request->input('operation');

    $cart = Session::get('cart', []);

    // Update the quantity and total of the item in the cart
    if (array_key_exists($productId, $cart)) {
        if ($operation == 'increment') {
            $cart[$productId]['quantity']++;
        } elseif ($operation == 'decrement') {
            $cart[$productId]['quantity']--;
            if ($cart[$productId]['quantity'] <= 0) {
                unset($cart[$productId]);
            }
        }
        if (array_key_exists($productId, $cart))
        {$cart[$productId]['total'] = $cart[$productId]['price'] * $cart[$productId]['quantity'];}
        Session::put('cart', $cart);
    }

    return redirect()->back();
}

    
    public function removeFromCart(Request $request)
    {
        $productId = $request->input('product_id');

        $cart = Session::get('cart', []);

        // Remove the item from the cart
        if (array_key_exists($productId, $cart)) {
            unset($cart[$productId]);
            Session::put('cart', $cart);
        }

        return redirect()->back();
    }
    public function checkout(){
        $cart = Session::get('cart', []);
        $totalItems = array_sum(array_column($cart, 'quantity'));
        if($totalItems == 0)
        {
            return redirect()->route('cart.index');
        }
        if(Auth::check())
        {
            return view('front.checkout');
           
        }
        else
        {
            
            session(['intended_url' => 'cart.checkout']);
    
                return redirect()->route('account.login');
        }
       
    }
}
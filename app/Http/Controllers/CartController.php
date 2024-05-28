<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\CustomerAddress;
use App\Models\ShippingCharges;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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
            $user = Auth::user();
            $shippingCharges = ShippingCharges::all();
            if ($user->customerAddress()->exists()) {
                $customerAddress = $user->customerAddress;
                return view('front.checkout',compact('user','customerAddress','shippingCharges'));
            } else {
                return view('front.checkout',compact('user','shippingCharges'));
            }
            
           
        }
        else
        {
            
            session(['intended_url' => 'cart.checkout']);
    
                return redirect()->route('account.login');
        }
       
    }
    public function processCheckout(Request $request){
          
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'district' => 'required',
            'address' => 'required',
            'city' => 'required',
            'zip' => 'required',
            'mobile' => 'required',
            'payment_method' => 'required',
        ]);

        $user=Auth::user();

        CustomerAddress::updateOrCreate(
            ['user_id' => $user->id],
            [
                'district' => $request->district,
                'address' => $request->address,
                'apartment' => $request->apartment,
                'city' => $request->city,
                'state' => $request->state,
                'zip' => $request->zip
            ]
        );

        $cart = Session::get('cart', []);
        $totalPrice = 0;
        $shipping = 20;
        foreach ($cart as $item) {
            $totalPrice += $item['total'];
        }

        if($request->payment_method == 'cod')
        {
            
        $order = new Order();
        $order->user_id = $user->id;
        $order->payment_method = $validatedData['payment_method'];
        $order->subtotal= $totalPrice;
        $order->shipping= $shipping;
        $order->grand_total= $totalPrice + $shipping;
        $order->district = $validatedData['district'];
        $order->address = $validatedData['address'];
        $order->apartment = $request->apartment;
        $order->city = $validatedData['city'];
        $order->state = $request->state;
        $order->zip = $validatedData['zip'];
        $order->notes = $request->order_notes;
        $order->save();


        foreach ($cart as $item) {
            $orderItem = new OrderItem();
            $orderItem->order_id = $order->id;
            $orderItem->product_id = $item['product_id'];
            $orderItem->name = $item['product_name'];
            $orderItem->price = $item['price'];
            $orderItem->qty = $item['quantity'];
            $orderItem->total = $item['total'];
            $orderItem->save();
        }

        // Clear the cart
        Session::forget('cart');

        // Redirect or return a response
        return redirect()->route('cart.index')->with('success', 'Order placed successfully!');

        }
        else
        {

        }

    }
}
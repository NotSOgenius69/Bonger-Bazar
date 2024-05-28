<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ShippingCharges;
use App\Models\Order;
use App\Models\User;

class HomeController extends Controller
{
    public function index(){
        if(Auth::check()){
        if(auth()->user()->role == 0)
        {
            $orderCount = Order::count();
            $userCount = User::count();
            $totalSales = Order::sum('grand_total');
            return view('admin.dashboard',compact('orderCount','userCount','totalSales'));
        }
        else return redirect('/') ;
        }
        else 
        return redirect()->route('account.login');
       
    }
    public function shipping(){
        if(Auth::check()){
        if(auth()->user()->role == 0)
        {
            $shipping=ShippingCharges::all();
            return view('admin.shipping.list',compact('shipping'));
        }
        else return redirect('/') ;
        }
        else 
        return redirect()->route('account.login');
       
    }
    public function showOrders(){
        if(Auth::check()){
            if(auth()->user()->role == 0)
            {
                $orders = Order::with('user')->paginate(5);
               
                return view('admin.orders.list',compact('orders'));
            }
            else return redirect('/') ;
            }
            else 
            return redirect()->route('account.login');
    }
    public function showUsers(){
        if(Auth::check()){
            if(auth()->user()->role == 0)
            {
                $users = User::paginate(5);
                return view('admin.users.list',compact('users'));
            }
            else return redirect('/') ;
            }
            else 
            return redirect()->route('account.login');
    }

    
}

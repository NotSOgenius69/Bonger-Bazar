<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;


class UserController extends Controller
{
    public function profile(){
    
        if (Auth::check()) {
            $user = Auth::user();

            if ($user->role == 0) { 
                return  redirect('/');
            } 
            elseif ($user->role == 1) { 
                return view('front.profile',compact('user'));
            } 
            else {
                abort(403, 'Unauthorized access');
            }
        }
         else {
            return redirect()->route('account.login');
        }

    }

    public function updateProfile(Request $request)
    {
       
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . Auth::id(),
            'phone' => 'required',
            'address' => 'required',
        ]);

        
        $user = Auth::user();

        
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->save();

        
        return redirect()->back()->with('success', 'Profile updated successfully!');
    }
    public function myOrders(){
        if (Auth::check()) {
            $user = Auth::user();
            $userOrders = Order::where('user_id',$user->id)->get();
            if ($user->role == 0) { 
                return  redirect('/');
            } 
            elseif ($user->role == 1) { 
                return view('front.myorders',compact('userOrders'));
            } 
            else {
                abort(403, 'Unauthorized access');
            }
        }
         else {
            return redirect()->route('account.login');
        }
    }
}

<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdminLoginController extends Controller
{
    public function index(){
        return view('admin.login');
    }
    public function authenticate(Request $request){
           if(Auth::guard('admin')->attempt(['email'=>$request->email,'password'=>$request->password],$request->get('remember'))){
             $admin=Auth::guard('admin')->user();
              if($admin->role==0)
              return redirect()->route('admin.dashboard');
              else
              {
                Auth::guard('admin')->logout();
                return redirect()->route('admin.login')->with('error','You are not authorized to access admin panel');
              }
           }
           else
           {
            return redirect()->route('admin.login')->with('error','Credentials is incorrect.Please check again.');
           }
    }
    
}

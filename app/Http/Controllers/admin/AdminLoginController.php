<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

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
                return redirect()->route('front.home');
              }
           }
           else
           {
            return redirect()->route('admin.login')->with('error','Credentials is incorrect.Please check again.');
           }
    }
    public function register(Request $request)
    {
      $validator = Validator::make($request->all(), [
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'string', 'min:8'],
      ]);
      if($validator->passes())
      {
        $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->role = 1;
        $user->save();
      }
      return redirect()->route('front.home')->with('success','Registration Successful');

    }
    public function logout(){
      Auth::guard('web')->logout();
      return redirect()->route('front.home');
  }
    
}

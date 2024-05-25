<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function index(){
        return view('admin.login');
    }
    public function authenticate(Request $request){
           if(Auth::attempt(['email'=>$request->email,'password'=>$request->password],$request->get('remember'))){
            if (session()->has('intended_url')) {
              $intended_url = session()->get('intended_url');
              session()->forget('intended_url');
              return redirect()->route($intended_url);
          }
            
             $user=Auth::user();
              if($user->role==0){
                // dd($user);
                return redirect()->route('admin.dashboard');
              }
              
              else
              {
                return redirect()->route('front.home');
              }
           }
           else
           {
            return redirect()->route('account.login')->with('error','Credentials is incorrect.Please check again.');
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
      return redirect()->route('account.login')->with('success','Registration Successful');

    }
    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('front.home');
    }

}

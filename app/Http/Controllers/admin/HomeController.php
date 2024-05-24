<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        if(auth()->user()->role == 0)
        return view('admin.dashboard');
        else return redirect('/') ;
       
    }
    
}

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index(){
        return view('welcome');
    }
    
      public function about(){
        return '<h1>About Page</h1>';
    }
    
     public function contact(){
        return '<h1>contact Page</h1>';
    }

}
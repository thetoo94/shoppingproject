<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class HomePageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products =Product::inRandomOrder()->take(9)->get();
        
        return view('home')->with('products',$products);
    }

   
}

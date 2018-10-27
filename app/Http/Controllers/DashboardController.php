<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Order;



class DashboardController extends Controller
{
    public function index(){
         
         $productcount =Product::all()->count();
         $categorycount =Category::all()->count();
         $ordercount =Order::all()->count();
         
    	return view('admin-panel/dashboard_home')->with([
    		'productcount' => $productcount, 
            'categorycount' => $categorycount,
             'ordercount' => $ordercount,
    	]);
    }

   

    public function CategoryEdit($id) {

    }

}

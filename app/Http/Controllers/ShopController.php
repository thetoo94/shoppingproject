<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
         if (request()->category) {
             
             $products = Product::with('categories')->whereHas('categories', function($query){
              $query->where('slug' , request()->category);
             });

             $categories = Category::all();
             $categoryName = $categories->where('slug' ,request()->category)->first()->name;
         
         }else {
         
          $products =Product::inRandomOrder()->take(6);
         $categories = Category::all();
         $categoryName = 'Featured';
        
         
        
        }


        if (request()->sort == 'low_hight') {
            
            $products = $products->orderBy('price')->paginate(6);

        }elseif (request()->sort == 'hight_low') {
            
             $products = $products->orderBy('price', 'desc')->paginate(6);
        } else {
            $products = $products->paginate(6);
        }
       
        return view('shop')->with([
                'products'=> $products,
                'categories' => $categories,
                'categoryName' => $categoryName,

        ]);
    }

    
    public function show($slug)
    
    {
        $product = Product::where('slug',$slug)->firstOrfail();

        // $mightAlsoLike = Product::where('slug','!=',$slug)->inRandomOrder()->take(4)->get();

        return view('product-detail')->with([

            'product'=> $product,
           
            // 'mightAlsoLike' => $mightAlsoLike,

        ]);

    }

    
}

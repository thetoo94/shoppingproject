<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use File;
use Storage;

class AdminProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $products = Product::paginate(12);

        return view('admin-panel/product_list')->with('products' , $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $categories = Category::get()->all();
          
          return view('admin-panel/product_add')->with('categories' ,$categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $request->validate(Product::$rules);
       // dd($request->all());
     
     //  $product = Product::create([

     //     'name'=> $request->name,
     //     'slug'=> $request->slug,
     //     'details'=>$request->details,
     //     'price'=> $request->price,
     //     'description'=>$request->description,        
      
     //   ]);

     // $product->categories()->attach($request->categories);
     // $product->save();
        
        //image for product
       $image = $request->file('slug');
       $new_name = rand().'.'.$image->getClientOriginalExtension();
       $image->move(public_path("storage/"), $new_name);
       ////////////////////////

       $products = Product::create([
         'name'=> $request->name,
         'slug'=> $new_name,
         'details'=> $request->details,
         'price'=> $request->price,
         'description'=> $request->description,
         ])->categories()->attach($request->category);

     
     
     return redirect()->route("product-list.store")->with('success','Product Add Successfully !!!');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
           $products = Product::findOrFail($id);
           $categories = Category::get()->all();

            return view('admin-panel/product_edit')->with([
                'products' => $products,
                'categories' => $categories,
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $products = Product::findOrFail($id);



         if($request->slug) {
              
              \File::delete( public_path('storage/'.$products->slug ) );
              $image = $request->file('slug');
              $new_name = rand().'.'.$image->getClientOriginalExtension();
              $image->move(public_path("storage/"), $new_name);

         }else {
            $new_name = $products->slug;
         }

         $products->name =$request->name;
         $products->slug =$new_name;
         $products->details =$request->details;
         $products->price =$request->price;
         $products->description =$request->description;
         $products->update();
         $products->categories()->attach($request->category);
         return redirect()->route('product-list.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {    
         $products = Product::findOrFail($id);
         // $delete = $products->slug;
         if($products->slug) {
            \File::delete( public_path('storage/'.$products->slug ) );
          }
          
         // File::delete(public_path("storage/"), $delete);
          Product::destroy($id);
        return redirect()->route('product-list.index')->with('success','Product Destory Successfully !!!');

    }
}

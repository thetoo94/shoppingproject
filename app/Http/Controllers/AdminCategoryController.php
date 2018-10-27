<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class AdminCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          
          $categories =Category::get()->all();

         return view('admin-panel/category_list')->with('categories' ,$categories);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin-panel/category_add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
         
         $request->validate(Category::$rules);  

         Category::create([

         'name'=> $request->name,
         'slug'=> $request->slug,

       ]);

        return redirect()->route('category-list.index')->with('success','Product Add Successfully !!!');
    
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
        
           $category = Category::findOrFail($id);

            return view('admin-panel/category_edit')->with('category', $category);
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
          $request->validate(Category::$rules);
          $category = Category::findOrFail($id);
          $category->name = $request->name;
          $category->slug = $request->slug;
          $category->save();
          return redirect()->route('category-list.index')->with('success','Product Updated Successfully !!!');
       

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::destroy($id);
        return redirect()->route('category-list.index')->with('success','Product Destory Successfully !!!');
    }
}

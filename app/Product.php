<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    
    protected $fillable = ['name', 'slug' , 'details' , 'price' ,'description' ,'created_at', 'updated_at'];

     public function categories()
   {
   
   	return $this->belongsToMany('App\Category'); 
   
   }

    public static $rules = [
      'name'  => 'required',
      'slug'  => 'required|image|mimes::jpg,png,jepg,gif|max:3048',
      'details' => 'required',
      'price' => 'required|numeric',
      'description'    => 'required',
  ];

    public function presetPrice() {

    	return money_format('$%i', $this->price /100);
    }
}

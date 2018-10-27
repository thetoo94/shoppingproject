<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
     
     protected $fillable = ["name", "slug" ];

    protected $table = 'category';

    public static $rules = [
      'name'  => 'required',
      'slug'  => 'required',
  ];

      public function products()
   {
   
   	return $this->belongsToMany('App\Product'); 
   
   }




}

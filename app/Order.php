<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
     protected $fillable = ['name' , 'email' , 'address', 'town' , 'phone','comment' ];
     
      protected $table = 'order';


     public static $rules = [
      
      'name'  => 'required',
      'email'  => 'required',
      'address' => 'required',
      'town'    => 'required',
      'phone' => 'required|numeric',
      

  ];
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use Cart;
use PDF;

class OrderController extends Controller
{
    public function Orderstore (Request $request) {

    	 $request->validate(Order::$rules);

    	Order::create([
         
         'name'=> $request->name,
         'email'=> $request->email,
         'address'=> $request->address,
         'town'=> $request->town,
         'phone'=> $request->phone,
         'comment' => $request->comment,
         
         ]);
         
       

    	 $pdf = PDF::loadView('pdf.invoice', array('customer' => $request))->save('storage/pdf/'.$request->email.'.pdf')->stream('invoice.pdf');
        

          Cart::destroy();
        
          return redirect()->route('home');

    }
}

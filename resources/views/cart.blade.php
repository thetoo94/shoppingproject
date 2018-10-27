@extends('layouts.master')

@section('content')
<div class="cart-table-area section-padding-100">
            <div class="container-fluid">
                <div class="row">

                   <div class="col-12 col-lg-8">
                         
                          @if(session()->has('success_message'))
                    <div class="alert alert-success">
                        {{ session()->get('success_message')}}
                    </div>
                 @endif

                  @if(count($errors)>0)
                  <div class="alert alert-danger">
                      <ul>
                          @foreach($errors->all() as $error)
                           <li>{{ $error }}</li>
                        @endforeach
                      </ul>
                  </div>
                  @endif
                 


                        <div class="cart-title mt-50">
                            <h2>Shopping Cart</h2>
                        </div>

                    @if (Cart::count()>0)
                       <div class="alert alert-success">
                        {{ Cart::count() }} item(s) in Shopping Cart 
                    </div>
                        
                        <div class="cart-table clearfix">
                            <table class="table table-responsive">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                     @foreach(Cart::content() as $item)
                                    <tr>
                                      <td class="cart_product_img">
                                            <a href="{{ route('shop.show', $item->model->slug) }}"><img src="{{ asset('vendor/img/'.$item->model->slug ) }}" alt="Product"></a>
                                        </td>
                                        <td class="cart_product_desc">
                                            <h5>{{ $item->model->name }}</h5>
                                        </td>
                                        <td class="price">
                                            <span>{{ $item->model->presetPrice() }}</span>
                                        </td>
                                        <td class="qty">
                                            <div class="qty-btn d-flex">
                                                <p>Qty</p>

                                                <div class="quantity">
                                                    <span class="qty-minus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) effect.value--;return false;"><i class="fa fa-minus" aria-hidden="true"></i></span>
                                                    <input type="number" class="qty-text" id="qty" step="1" min="1" max="300" name="quantity" value="1">
                                                    <span class="qty-plus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty )) effect.value++;return false;"><i class="fa fa-plus" aria-hidden="true"></i></span>
                                                </div>

                                            </div>
                                           
                                        </td>
                                        <td>
                                             <div class="qty-btn d-flex">
                                               <div class="quantity">
                                                 <form action="{{ route('cart.destroy',$item->rowId) }}" method="POST" >
                                                     {{ csrf_field() }}
                                                     {{ method_field('DELETE') }}

                                                     <button type="submit" class="btn btn-primary" >Remove</button>
                                                 </form>
                                                 </div>
                                            </div>
                                        </td>
                                    </tr>
                                     @endforeach


                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="cart-summary">
                            <h5>Cart Total</h5>
                            <ul class="summary-table">
                                <li><span>subtotal:</span> 
                                    <span> {{ Cart::subtotal() }} </span>
                                </li>
                                <li><span>Tax(13%)</span> 
                                    <span>{{ Cart::tax() }}</span>
                                </li>
                                <li><span>delivery:</span> 
                                    <span>Free</span>
                                </li>
                                <li><span>total:</span> 
                                    <span>{{ Cart::total() }}</span>
                                </li>
                            </ul>
                            <div class="cart-btn mt-100">
                                <a href="{{ route('checkout.index') }}" class="btn amado-btn w-100">Checkout</a>
                            </div>
                        </div>
                    </div>

                 @else
                   
                   <div class="alert alert-success">
                        No item(s) in Shopping Cart 
                    </div>
                   <div> 
                      <a href="{{ route('shop.index') }}" class="btn amado-btn">Continue Shopping</a>
                   </div>

                 @endif

                 </div>
                 
        </div>
    </div>
    <!-- ##### Main Content Wrapper End ##### -->

@endsection

@section('extra-js')
 <script>
    
 </script>
@endsection
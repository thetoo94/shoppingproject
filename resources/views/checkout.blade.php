@extends('layouts.master')

@section('content')

<div class="cart-table-area section-padding-100">
          <div class="container-fluid">
              <div class="row">
                  <div class="col-12 col-lg-8">
                      <div class="checkout_details_area mt-50 clearfix">
                          <div class="cart-title">
                              <h4>Your Order</h4>
                          </div>

                          <!--****************************************************-->
                          <table class="table table-responsive">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Name</th>
                                        <th>Quantiy</th>
                                        <th>Price</th>
                                       
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
                                        <td class="cart_product_desc">
                                            <h5>{{ $item->qty }}</h5>
                                        </td>
                                        <td class="price">
                                            <span>{{ $item->model->presetPrice() }}</span>
                                        </td>
                                        
                                    </tr>
                                     @endforeach
                                  </tbody>
                            </table>
                           <!-- **************************************************-->
                         
                            <div class="cart-title">
                              <h2>Checkout</h2>
                          </div>

                          <form action="{{ route('customer.order') }}" method="post">
                               {{csrf_field() }}
                              <div class="row form-group">
                                  <div class="col-md-12 mb-3 form-group">
                                      <input type="text" class="form-control" id="first_name" name="name" placeholder="Name" required>
                                  </div>
                                  <div class="col-12 mb-3 form-group">
                                      <input type="email" class="form-control" id="email" placeholder="Email" name="email" required>
                                  </div>
                               
                                  <div class="col-12 mb-3 form-group">
                                      <input type="text" class="form-control mb-3" id="street_address" placeholder="Address" name="address" required>
                                  </div>
                                  <div class="col-12 mb-3 form-group">
                                      <input type="text" class="form-control" id="city" placeholder="Town" name="town" required>
                                  </div>
                                  <div class="col-md-6 mb-3 form-group">
                                      <input type="number" class="form-control" id="phone_number" min="0" placeholder="Phone No" name="phone" required>
                                  </div>
                                  <div class="col-12 mb-3 form-group">
                                      <textarea name="comment" class="form-control w-100" id="comment" cols="30" rows="10" placeholder="Leave a comment about your order"></textarea>
                                  </div>

                              </div>
                            
                              <button type="submit" class="btn amado-btn mb-15">Complete Order</button>
                          
                          </form>
                      </div>
                  </div>
                  <div class="col-12 col-lg-4">
                      <div class="cart-summary">
                          <h5>Cart Total</h5>
                          <ul class="summary-table">
                              <li><span>subtotal:</span> 
                                  <span>{{ Cart::subtotal() }}</span>
                                </li>
                              <li><span>delivery:</span> 
                                  <span>Free</span>
                              </li>
                              <li><span>Tax:</span> 
                                  <span>{{ Cart::tax() }}</span>
                              </li>
                              <li><span>total:</span> 
                                  <span>{{ Cart::total() }}</span>
                              </li>
                          </ul>

                          <div class="payment-method">
                              <!-- Cash on delivery -->
                              <div class="custom-control custom-checkbox mr-sm-2">
                                  <input type="checkbox" class="custom-control-input" id="cod" checked>
                                  <label class="custom-control-label" for="cod">Cash on Delivery</label>
                              </div>
                              <!-- Paypal -->
                              <!-- <div class="custom-control custom-checkbox mr-sm-2">
                                  <input type="checkbox" class="custom-control-input" id="paypal">
                                  <label class="custom-control-label" for="paypal">Paypal <img class="ml-15" src="img/core-img/paypal.png" alt=""></label>
                              </div> -->
                          </div>

                         
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- ##### Main Content Wrapper End ##### -->

@endsection

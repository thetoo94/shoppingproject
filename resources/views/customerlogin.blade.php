@extends('layouts.master')


@section('content')
<div class="cart-table-area section-padding-100">
          <div class="container-fluid">
              <div class="row">
                  <div class="col-12 col-lg-8">
                      <div class="checkout_details_area mt-50 clearfix">
                         

                          <div class="cart-title">
                              <h2>Login</h2>
                          </div>

                          <form action="#" method="post">
                              <div class="row">
                                  <div class="col-12 mb-3">
                                      <input type="email" class="form-control"  placeholder="Email" value="">
                                  </div>
                                  <div class="col-md-12 mb-3">
                                      <input type="text" class="form-control"  value="" placeholder="Password" required>
                                  </div>
                                  <div class="col-md-12 mb-3">
                                <button type="submit" href="#" class="btn amado-btn mb-15">Login
                                </button>
                                 </div>
                              </div>
                             
                         </form> 
                        <p>Or</p><a href="#" class="btn amado-btn mb-15">Sign Up</a>

                      </div>
                  </div>
              </div>
          </div>
</div>


@endsection
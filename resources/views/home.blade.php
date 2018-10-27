@extends('layouts.master')


@section('content')

<!-- Product Catagories Area Start -->
     
      <div class="products-catagories-area clearfix">
          <div class="amado-pro-catagory clearfix">
             @foreach($products as $product)
              <!-- Single Catagory -->
              <div class="single-products-catagory clearfix">
                  <a href="{{ route('shop.index') }}">
                      <img src="{{ asset('vendor/img/'.$product->slug ) }}" alt="" height="300">
                      <!-- Hover Content -->
                      <div class="hover-content">
                          <div class="line"></div>
                          <p>{{ $product->presetPrice() }}</p>
                          <h4>{{ $product->name }}</h4>
                      </div>
                  </a>
              </div>
            @endforeach
        </div>
              
      </div>
      <!-- Product Catagories Area End -->

@endsection

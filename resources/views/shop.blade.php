@extends('layouts.master')

@section('content')

<div class="shop_sidebar_area">

           <!-- ##### Single Widget ##### -->
           <div class="widget catagory mb-50">
               <!-- Widget Title -->
               <h6 class="widget-title mb-30">Catagories</h6>

               <!--  Catagories  -->
               <div class="catagories-menu">
                   <ul>
                     @foreach ($categories as $category)
                      <li class="{{ request()->category == $category->slug ? 'active' : '' }}">
                        <a href="{{ route('shop.index',['category' => $category->slug]) }}">{{ $category->name }}</a></li>
                      @endforeach
                      <!--  <li class="active"><a href="#">Chairs</a></li> -->
                   </ul>
               </div>
           </div>
           
           <!-- ##### Single Widget ##### -->
           <div class="widget price mb-50">
               <!-- Widget Title -->
               <h6 class="widget-title mb-30">Price</h6>

               <div class="catagories-menu">
                   <ul>
                      <li><a href="{{ route('shop.index',['category' => request()->category, 'sort' =>'hight_low']) }}">Hight To Low </a></li>
                      <li><a href="{{ route('shop.index',['category' => request()->category, 'sort' =>'low_hight']) }}">Low To Hight </a></li>
                   </ul>
               </div>
           </div>
       </div>

       <div class="amado_product_area section-padding-100">
           <div class="container-fluid">

               <div class="row">
                   <div class="col-12">
                       <div class="product-topbar d-xl-flex align-items-end justify-content-between">
                           <!-- Total Products -->
                           <div class="total-products">
                               <h3>{{ $categoryName }}</h3>
                               <!-- <div class="view d-flex">
                                   <a href="#"><i class="fa fa-th-large" aria-hidden="true"></i></a>
                                   <a href="#"><i class="fa fa-bars" aria-hidden="true"></i></a>
                               </div> -->
                           </div>
                           <!-- Sorting -->
                           <div class="product-sorting d-flex">
                               <div class="sort-by-date d-flex align-items-center mr-15">
                                   <p>Sort by</p>
                                   <form action="#" method="get">
                                       <select name="select" id="sortBydate">
                                           <option value="value">Date</option>
                                           <option value="value">Newest</option>
                                           <option value="value">Popular</option>
                                       </select>
                                   </form>
                               </div>
                               <div class="view-product d-flex align-items-center">
                                   <p>View</p>
                                   <form action="#" method="get">
                                       <select name="select" id="viewProduct">
                                           <option value="value">12</option>
                                           <option value="value">24</option>
                                           <option value="value">48</option>
                                           <option value="value">96</option>
                                       </select>
                                   </form>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>

               <div class="row">
             @forelse($products as $product)
                   
                   <!-- Single Product Area -->
                   <div class="col-12 col-sm-6 col-md-12 col-xl-6">
                       <div class="single-product-wrapper">
                           <!-- Product Image -->
                           <div class="product-img">
                               <img src="{{ asset('vendor/img/'.$product->slug ) }}" alt="">
                               <!-- Hover Thumb -->
                               <img class="hover-img" src="{{ asset('vendor/img/'.$product->slug ) }}" alt="">
                           </div>

                           <!-- Product Description -->
                           <div class="product-description d-flex align-items-center justify-content-between">
                               <!-- Product Meta Data -->
                               <div class="product-meta-data">
                                   <div class="line"></div>
                                   <p class="product-price">{{$product->presetPrice() }}</p>
                                   <a href="{{ route('shop.show', $product->slug) }}">
                                       <h6>{{ $product->name }}</h6>
                                   </a>
                               </div>
                               <!-- Ratings & Cart -->
                               <div class="ratings-cart text-right">
                                   <div class="ratings">
                                       <i class="fa fa-star" aria-hidden="true"></i>
                                       <i class="fa fa-star" aria-hidden="true"></i>
                                       <i class="fa fa-star" aria-hidden="true"></i>
                                       <i class="fa fa-star" aria-hidden="true"></i>
                                       <i class="fa fa-star" aria-hidden="true"></i>
                                   </div>
                                   <div class="cart">
                                       <a href="cart.html" data-toggle="tooltip" data-placement="left" title="Add to Cart"><img src="img/core-img/cart.png" alt=""></a>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
                @empty
                
              <div> NO ITEMS FOUND!</div>

               @endforelse
               
               <!-- {{ $products->links() }} -->


           
               <div class="row">
                   <div class="col-12">
                       <!-- Pagination -->
                      <!--  <nav aria-label="navigation">
                           <ul class="pagination justify-content-end mt-50">
                               <li class="page-item active"><a class="page-link" href="#">01.</a></li>
                              <li class="page-item"><a class="page-link" href="#">02.</a></li>
                               <li class="page-item"><a class="page-link" href="#">03.</a></li>
                               <li class="page-item"><a class="page-link" href="#">04.</a></li> 
                           </ul>
                       </nav> -->
                   </div>
               </div>
           </div>
           {{ $products->appends(request()->input())->links() }}
       </div>
   </div>
   <!-- ##### Main Content Wrapper End ##### -->

@endsection

<style>
  .pagination li span {
    padding: 15px;
    margin-right: 10px;
    border: 1px solid #ffff;
    background: #fab718;
    color: #ffff;
  }
   .pagination li a {
    padding: 15px;
    margin-right: 10px;
    border: 1px solid #ffff;
    background: gray;
    color: #ffff;
   }
</style>

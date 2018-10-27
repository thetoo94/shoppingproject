@extends('layouts.dashboard_master')

@section('contant')
<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Product List Table</h4>
                  <p class="card-description">
                    
                  </p>
                  <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                      <thead>
                        <tr>
                         <!--  <th>
                            #
                          </th> -->
                          <th>
                            Image
                          </th>
                          <th>
                             Name
                          </th>
                          <th>
                            Slug
                          </th>
                          <th>
                            Details
                          </th>
                          <th>
                            Price
                          </th>
                          <th>
                            Description
                          </th>
                        </tr>
                      </thead>
                      <tbody>

                        @foreach($products as $product)
                        <tr>
                          <!-- <td>
                            {{ $product->id }}
                          </td> -->
                          <td>
                            <img class="width:100px;" src="{{ asset('storage/'.$product->slug ) }}" alt="">
                          </td>
                          <td>
                           {{ $product->name }}
                          </td>
                          <td>
                            {{ $product->slug }}
                          </td>
                          <td>
                            {{ $product->details }}
                          </td>
                          <td>
                           {{ $product->price }}
                          </td>
                          <td>
                           {{ $product->description }}
                          </td>
                          <td>
                            <a class="btn btn-primary"
                            href="{{ route('product-list.edit',$product->id ) }}">Edit</a>
                          </td>
                          <td>
                            <form action="{{ route('product-list.destroy', $product->id) }}"
                              method="post">
                              {{ csrf_field() }}
                              <input type="hidden" name="_method" value="delete">
                              <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                          </td>
                        </tr>
                        @endforeach
                 </tbody>
                 <br>
                     {{ $products->links() }}
                    </table>
                 
                  </div>
                </div>
              </div>
            </div>
@endsection

<style>
  .pagination li span {
    padding: 10px;
    margin-right: 10px;
    border: 1px solid #518ee4;
    background: #fff;
    color: #0f66cb;
  }
   .pagination li a {
    padding: 12px;
    margin-right: 10px;
    border: 1px solid #518ee4;
    background: #fff;
    color: #0f66cb;
   }
</style>

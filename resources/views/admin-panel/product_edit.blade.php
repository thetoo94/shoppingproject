@extends('layouts.dashboard_master')

@section('contant')
<div class="col-12 grid-margin">
              <div class="card">
               <div class="card-body">
                  <h4 class="card-title">Add New Product</h4>
                 <form method="post" 
                 action="{{ route('product-list.update', $products->id ) }}"  class="forms-sample" enctype="multipart/form-data">
                    {{ method_field("put") }}
                    {{ csrf_field()}}
                   
                    <div class="form-group">
                      <label>Name</label>
                      <input type="text" class="form-control" name= "name" placeholder="Name"
                       value="{{ $products->name }}">
                    </div>
                    
                    <div class="form-group">
                      <label>Price</label>
                      <input type="text" class="form-control" name="price" placeholder="$"
                       value="{{ $products->price }}">
                    </div>
                    
                    <div class="form-group">
                      <label>Details</label>
                      <input type="text" class="form-control" name="details" placeholder="Details" value="{{ $products->details }}">
                    </div>
                    
                    <div class="form-group">
                    <label for="exampleFormControlSelect2">Category select</label>
                    <select class="form-control" id="exampleFormControlSelect2" name="category" >
                      @foreach($categories as $category )
                       <option value="{{ $category->id }}" >{{ $category->name }}</option>
                     @endforeach
                    </select>
                  </div>
                   
                   <div class="form-group">
                      <label>File upload</label>
                      <br>
                      <img style="width:100px;height:100px" src="{{ asset('storage/'.$products->slug) }}">
                      <br>
                      <br>
                      <p>If edit Product Image Please Add</p>
                        <input type="file" class="form-control file-upload-info" name ="slug" placeholder="Upload Image">                  
                    </div>
                    
                    <div class="form-group">
                      <label for="exampleTextarea1">Description</label>
                      <textarea class="form-control" name="description" rows="3"
                      >{{ $products->description }}</textarea>
                    </div>
                    
                    <button type="submit" class="btn btn-success mr-2">Update Product</button>
                  
                  </form>

                </div>
              </div>
            </div>
@endsection

@extends('layouts.dashboard_master')

@section('contant')
<div class="col-12 grid-margin">
              <div class="card">
               
                @if(count($errors)>0)
                 <div class="alert alert-danger">
                  Product Add Valication Error
                  @foreach($errors->all() as $error)
                     <ul>
                       <li>{{ $error }}</li>
                     </ul>
                  @endforeach
                  </div>
                 @endif
                  @if(session()->has('success'))
                <div class="alert alert-success">
                  <strong>{{ session()->get('success') }}</strong>
                </div>
                  @endif

                
                <div class="card-body">
                  <h4 class="card-title">Add New Product</h4>
                 <form method="post" action="{{ route('product-list.store') }}"  class="forms-sample" enctype="multipart/form-data">
                    {{ csrf_field()}}
                   
                    <div class="form-group">
                      <label>Name</label>
                      <input type="text" class="form-control" name= "name" placeholder="Name">
                    </div>
                    
                    <div class="form-group">
                      <label>Price</label>
                      <input type="text" class="form-control" name="price" placeholder="$">
                    </div>
                    
                    <div class="form-group">
                      <label>Details</label>
                      <input type="text" class="form-control" name="details" placeholder="Details">
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
                        <input type="file" class="form-control file-upload-info" name ="slug" placeholder="Upload Image">                  
                    </div>
                    
                    <div class="form-group">
                      <label for="exampleTextarea1">Description</label>
                      <textarea class="form-control" name="description" rows="3"></textarea>
                    </div>
                    
                    <button type="submit" class="btn btn-success mr-2">Add Product</button>
                  
                  </form>

                </div>
              </div>
            </div>
@endsection

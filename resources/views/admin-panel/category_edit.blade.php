@extends('layouts.dashboard_master')

@section('contant')
<div class="col-8">
                  <div class="card">
                    <div class="card-body">
                      
                     <h4 class="card-title">Add New Category</h4>
                      <p class="card-description">
                       
                      </p>
                      <form method="post" 
                      action="{{ route('category-list.update' ,$category->id ) }}" class="forms-sample">
                      	{{ method_field("put") }}
                        {{ csrf_field()}}
                        <div class="form-group">
                          <label>Name</label>
                          <input type="text" class="form-control" name ="name" placeholder="Category Name" value="{{ $category->name }}">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Slug</label>
                          <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Slug" name="slug" value="{{ $category->slug }}" >
                        </div>
                        <button type="submit" class="btn btn-success mr-2">Submit</button>
                       
                      </form>
                    </div>
                  </div>
                </div>

@endsection

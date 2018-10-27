@extends('layouts.dashboard_master')

@section('contant')
<div class="col-8">
                  <div class="card">
                    <div class="card-body">
                       
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

                      <h4 class="card-title">Add New Category</h4>
                      <p class="card-description">
                       
                      </p>
                      <form method="post" action="{{ route('category-list.store') }}" class="forms-sample">
                        {{ csrf_field()}}
                        <div class="form-group">
                          <label>Name</label>
                          <input type="text" class="form-control" name ="name" placeholder="Category Name">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Slug</label>
                          <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Slug" name="slug" >
                        </div>
                        <button type="submit" class="btn btn-success mr-2">Submit</button>
                       
                      </form>
                    </div>
                  </div>
                </div>
@endsection

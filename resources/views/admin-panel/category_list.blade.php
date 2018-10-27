@extends('layouts.dashboard_master')

@section('contant')

<div class="col-lg-12 stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Category List Table</h4>
                  <p class="card-description">
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
                  </p>
                 
                  <div class="table-responsive">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <!-- <th>
                            #
                          </th> -->
                          <th>
                            Name
                          </th>
                          <th>
                            slug
                          </th>
                          <th>
                            Total Products
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        
                        @foreach( $categories as $category)
                        <tr >
                         <!--  <td>
                            {{ $category->id }}
                          </td> -->
                          <td>
                            {{ $category->name }}
                          </td>
                          <td>
                            {{ $category->slug }}
                          </td>
                          <td>
                            {{ $category->products()->count() }}
                          </td>
                          <td>
                            <a class="btn btn-primary"
                            href="{{ route('category-list.edit', $category->id) }}">Edit</a>
                          </td>
                          <td>
                            <form action="{{ route('category-list.destroy', $category->id) }}"
                             method="post" >
                              {{ csrf_field() }}
                              <input type="hidden" name="_method" value="delete">
                              <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                          </td>
                        </tr>
                       @endforeach


                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>

@endsection

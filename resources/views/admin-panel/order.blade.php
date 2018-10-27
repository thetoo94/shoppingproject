@extends('layouts.dashboard_master')

@section('contant')
<div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title mb-4">Order List</h5>
                  <div class="fluid-container">
                    

              <!-- -------------------------------------------------------------------    -->
                  
                 <div class="table-responsive">
                  <table class="table">
                      <thead>
                        <tr>
                         <!--  <th>id</th> -->
                          <th>Name.</th>
                          <th>Email</th>
                          <th>Address</th>
                          <th>Town</th>
                          <th>Phone</th>
                          <th>Comment</th>
                        </tr>
                      </thead>
                      <tbody>
                          @foreach($orders as $order)

                        <tr>
                         <!--  <td>{{ $order->id }}</td> -->
                          <td>{{ $order->name }}</td>
                          <td>{{ $order->email }}</td>
                          <td>{{ $order->address }}</td>
                          <td>{{ $order->town }}</td>
                          <td>{{ $order->phone }}</td>
                          <td>{{ $order->comment }}</td>
                          <td>
                            <a href="{{ route('order.viewpdf', $order->id ) }}"  class="btn btn-primary">Pending</a>
                          </td>
                        </tr>
                       
                         @endforeach

                      </tbody>
                    </table>
                 
                 </div>

                  </div>


            
                </div>
              </div>
            </div>
@endsection

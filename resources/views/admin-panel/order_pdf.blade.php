@extends('layouts.dashboard_master')

@section('contant')
<div class="col-lg-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
     <iframe src="{{ asset('storage/pdf/'.$order->email.'.pdf') }}" width=100% height="800"
      allowfullscreen="" webkitallowfullscreen=""></iframe>
    </div>
  </div>
</div>

@endsection

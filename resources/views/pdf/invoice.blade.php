<!DOCTYPE html>
<html>
<head>
  <style>
  #customers {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
  }

  #customers td, #customers th {
    border: 1px solid #ddd;
    padding: 8px;
  }

  #customers tr:nth-child(even){background-color: #f2f2f2;}

  #customers tr:hover {background-color: #ddd;}

  #customers th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: yellow;
    color: black;
  }
</style>
</head>
<body>


  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Customer Info</h4>
      <p class="card-description">
         Name : {{ $customer->name }}
      </p>
      <div class="row">
        <div class="col-md-6">
          <address>
            <p class="font-weight-bold">Address</p>
            <p>
              {{ $customer->address }}
            </p>
            
          </address>
        </div>
        <div class="col-md-6">
          <address class="text-primary">
            <p class="font-weight-bold">
              E-mail
            </p>
            <p class="mb-2">
              {{ $customer->email }}
            </p>
            <p class="font-weight-bold">
              Phone
            </p>
            <p>
             {{ $customer->phone }}
            </p>
          </address>
        </div>
      </div>
    </div>
  </div>





  <table id="customers">
    <tr>

      <th>Product Name</th>
      <th>Quantity</th>
      <th>Price</th>
    </tr>
    @foreach(Cart::content() as $data)  
    <tr>
     <!--  <td> <img class="width:100px;" src="{{ asset('storage/'.$data->slug ) }}" alt=""></td>  -->
      <td>{{ $data->name }}</td>
      <td>{{ $data->qty }}</td>
      <td>$ {{ $data->price }}</td>
    </tr>
    @endforeach

    <tr>

     <td></td>
     <td>Sub Total</td>
     <td> {{ Cart::subtotal() }}</td>
   </tr>

   <tr>

     <td></td>
     <td>Tax</td>
     <td> {{ Cart::tax() }}</td>
   </tr>

   <tr>

     <td></td>
     <td>Total</td>
     <td> {{ Cart::total() }}</td>
   </tr>

 </table>

</body>
</html>

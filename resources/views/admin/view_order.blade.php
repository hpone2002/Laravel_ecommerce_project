<!DOCTYPE html>
<html>
  <head> 
        @include('admin.css')

        <style>
            .page-content {
                background: #2d3035;
            }

            th {
                font-size: 18px;
                font-weight: bold;
                background: black;
            }

            h1 {
                margin-bottom: 2.5rem;
            }
        </style>
  </head>
  <body>
        @include('admin.header')

    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
        @include('admin.sidebar')
      <!-- Sidebar Navigation end-->

       <div class="page-content">
            <div class="page-header">
                <div class="container-fluid text-white">
                    <h1 class="mb-6">View Orders</h1>
                    <div>
                        <table boder="3"  cellpadding="10px" class="table table-striped table-bordered text-center">
                            <tr>
                                <th>Customer Name</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Product Title</th>
                                <th>Price</th>
                                <th>Image</th>
                                <th>Payment Status</th>
                                <th>Status</th>
                                <th>Change Status</th>
                                <th>Download PDF</th>
                            </tr>
                            @foreach ($orders as $order)
                                <tr>
                                    <td>{{$order->name}}</td>
                                    <td>{{$order->rec_address}}</td>
                                    <td>{{$order->phone}}</td>
                                    <td>{{$order->product->title}}</td>
                                    <td>{{$order->product->price}}$</td>
                                    <td>
                                        <img src="{{asset('product_images/'.$order->product->image)}}" width="50" />
                                    </td>
                                    <td>{{$order->payment_statuss}}</td>
                                    <td>
                                        @if ($order->status === "In progress")
                                            <span style="color: rgb(240, 15, 15);">{{$order->status}}</span>
                                        @elseif($order->status === "Delivered")
                                            <span style="color: rgb(36, 235, 36);">{{$order->status}}</span>
                                        @elseif ($order->status === "Denied")
                                            <span style="color: rgb(221, 218, 218);">{{$order->status}}</span>
                                        @else
                                            <span style="color: rgb(228, 228, 26);">{{$order->status}}</span>
                                        @endif
            
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <a class="btn btn-primary btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                              Status
                                            </a>
                                          
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                              <a class="dropdown-item" href="ontheway/{{$order->id}}">On the Way</a>
                                              <a class="dropdown-item" href="delivered/{{$order->id}}">Delivered</a>
                                              <a class="dropdown-item" href="denied/{{$order->id}}">Denied</a>
                                              <a class="dropdown-item" href="inprogress/{{$order->id}}">In Progress</a>
                                            </div>
                                          </div>
                                    </td>
                                    <td>
                                        <a href="{{url('print_pdf', $order->id)}}" class="btn btn-secondary btn-sm">Print PDF</a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- JavaScript files-->
        @include('admin.js')
  </body>
</html>
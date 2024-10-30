<!DOCTYPE html>
<html>

<head>
  @include('home.css')
</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
        @include('home.header')
    <!-- end header section -->

  </div>
  <!-- end hero area -->

  <section class="shop_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          My Orders
        </h2>

        <table border="3" cellpadding="15px"  class="table table-striped table-bordered table-sm">
            <tr>
                <th>Product Name</th>
                <th>Price</th>
                <th>Delivery Status</th>
                <th>Image</th>
            </tr>
            @foreach ($orders as $order)
              <tr>
                <td>{{$order->product->title}}</td>
                <td>{{$order->product->price}}$</td>
                <td>{{$order->status}}</td>
                <td>
                  <img src="{{asset('product_images/'.$order->product->image)}}" alt="image" width="50px" />
                </td>
              </tr>
            @endforeach
        </table>
      </div>
    </div>
  </section>

  <!-- info section -->
        @include('home.footer')
  <!-- end info section -->

        @include('home.js')
</body>

</html>
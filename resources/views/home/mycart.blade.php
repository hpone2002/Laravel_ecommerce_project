<?php 
$total_price = 0;

foreach ($carts as $cart) {
    $total_price += $cart->product->price;
}

?>

<!DOCTYPE html>
<html>

<head>
  @include('home.css')
  @vite(['resources/css/cart.css'])
</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
        @include('home.header')
    <!-- end header section -->
  </div>
  
  <section class="shop_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          My Shopping Cart
        </h2>

        <div 
          style="width: 100%;
          max-width: 750px;
          min-width: 300px" 
          class="text-right">
          <a href="#order_form" class="btn btn-success btn-sm float-right">
            Go to Order Form
          </a>
        </div>

        <table border="3" cellpadding="15px"  class="table table-striped table-bordered table-sm">
            <tr>
                <th>Title</th>
                <th>Image</th>
                <th>Price</th>
                <th>Remove</th>
            </tr>
            @foreach ($carts as $cart)
            <tr>
              <td>{{$cart->product->title}}</td>
              <td>
                  <img src="{{asset('product_images/' . $cart->product->image)}}" width="50" alt="">
              </td>
              <td>{{$cart->product->price}}$</td>
              <td>
                  <form action="{{url('remove_cart', $cart->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="submit" class="btn btn-danger btn-sm" value="Remove">
                  </form>
              </td>
            </tr>
            @endforeach
            <tr>
                <td colspan="4">Total Price = {{$total_price}}$</td>
            </tr>
        </table>
          
        <div class="order_form" id="order_form">
          <h4 style="margin_bottom: 20px;">
            FILL YOUR INFORMATION
          </h4>
          <form action="{{url('confirm_order')}}" class="text-left" method="POST">
            @csrf
            <div style="margin-bottom: 20px;">
              <label for="" class="form-control-label">Your Name</label><br>
              <input type="text" name="name" class="form-control form-control-sm">
            </div>
            <div class="my-6" style="margin-bottom: 20px">
              <label for="">Your Addrress</label><br>
              <textarea name="address" name="address" class="form-control form-control-sm" cols="30" rows="2"></textarea>
            </div>
            <div class="my-6" style="margin-bottom: 20px;">
              <label for="">Your Phone Number</label><br>
              <input type="text" name="phone" class="form-control form-control-sm">
            </div>
            <div class="my-6">
              <input type="submit" value="Cash On Delivery" class="btn btn-success btn-sm">
              <a href="{{url('stripe', $total_price)}}" class="btn btn-primary btn-sm">Pay Using Card</a>
            </div>
          </form>
        </div>
        
      </div>
    </div>
  </section>

  <!-- info section -->
        @include('home.footer')
  <!-- end info section -->

        @include('home.js')
</body>

</html>
<!DOCTYPE html>
<html>

<head>
  @include('home.css')
  @vite(['resources/css/product_detail.css'])
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
          Product Details
        </h2>
      </div>
      <div class="product_detail">
        <div class="box">
          <div class="img-box">
            <img src="{{ asset('product_images/' . $product->image) }}" alt="{{ $product->name }}">
          </div>
          <table>
              <tr>
                <td>Title</td>
                <td>{{$product->title}}</td>
              </tr>
              <tr>
                <td>Description</td>
                <td>{{$product->description}}</td>
              </tr>
              <tr>
                <td>Price</td>
                <td>{{$product->price}}</td>
              </tr>
              <tr>
                <td>Category</td>
                <td>{{$product->category}}</td>
              </tr>
              <tr>
                <td>Available Quantity</td>
                <td>{{$product->quantity}}</td>
              </tr>
          </table>
          <div class="p-1">
            <a href="{{url('add_cart', $product->id)}}" class="btn btn-primary btn-sm">Add to Cart</a>
            @guest
              <a href="{{url('/')}}" class="btn btn-danger btn-sm">Back</a>
            @endguest
            @auth
              <a href="{{url('/login_home')}}" class="btn btn-danger btn-sm">Back</a>
            @endauth
          </div>
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

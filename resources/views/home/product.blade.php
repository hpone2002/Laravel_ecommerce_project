<section class="shop_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Latest Products
        </h2>
      </div>
      <div class="row">
        @foreach ($products as $product)
        <div class="col-sm-6 col-md-4 col-lg-3">
          <div class="box">
            
              <div class="img-box">
                <img src="product_images/{{$product->image}}" alt="{{$product->name}}">
              </div>
              <div class="detail-box">
                <h6>
                  {{$product->title}}
                </h6>
                <h6>
                  Price
                  <span>
                    {{$product->price}}$
                  </span>
                </h6>
              </div>
              <div class="new">
                <span>
                  New
                </span>
              </div>
              <div class="p-1">
                <a href="{{url('product_detail', $product->id)}}" class="btn btn-danger btn-sm">Detail</a>
                <a href="{{url('add_cart', $product->id)}}" class="btn btn-primary btn-sm">Add to Cart</a>
              </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>
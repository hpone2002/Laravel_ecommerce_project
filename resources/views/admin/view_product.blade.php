<!DOCTYPE html>
<html>
  <head> 
        @include('admin.css')

        <style>
            .page-header {
                background: #22252a;
            }

            .titleSearch {
                display: flex;
                justify-content: space-between;
                align-items: center;
            }

            .div_deg {
                display: flex;
                justify-content: center;
                align-items: center;
                width: 100%;
            }

            .div_deg table {
                color: white;
                text-align: center;

                font-size: 16px;
                font-weight: bold;

                width: 100%;
            }

            .div_deg table td {
                font-size: 15px;
                font-weight: 0;
            }

            .div_deg table td img {
                width: 100px;

            }

            input[type='search'] {
                width: 120px;
                padding: 4px 10px;
                border-radius: 20px;
                font-size: 12px;
                font-weight: bold;
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
                <div class="container-fluid">
                    <div class="titleSearch">
                        <div>
                            <h1 style="color: white;">View Prodct</h1>
                        </div>
                        <div>
                            <form action="{{url('search_products')}}" method="GET">
                                @csrf
                                <input type="search" name="search">
                                <input type="submit" class="btn btn-success btn-sm" value="Search">
                                <a href="/view_product" class="btn btn-secondary btn-sm">All</a>
                            </form>
                        </div>
                    </div>
                    <div class="div_deg my-4">
                        <table border="2" cellpadding="15px">
                            <tr>
                                <th>Title</th>
                                <th>Image</th>
                                <th>Price</th>
                                <th>Description</th>
                                <th>Category</th>
                                <th>Quantity</th>
                            </tr>

                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $product->title}}</td>
                                    <td>
                                        <img src="product_images/{{$product->image}}" alt="{{$product->title}}">
                                    </td>
                                    <td>{{ $product->price}}</td>
                                    <td>
                                        {{ Str::words($product->description, 10, '...') }}
                                    </td>
                                    <td>{{ $product->category}}</td>
                                    <td>{{ $product->quantity}}</td>
                                    <td>
                                        <a type="submit" class="btn btn-success btn-sm" href="{{url('edit_product', $product->slug)}}">
                                            Edit
                                        </a>
                                    </td>
                                    <td>
                                        <form action="{{url('delete_product', $product->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete this product?')">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>

                    <div class="">
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
       </div>
    </div>


    <!-- JavaScript files-->
    @include('admin.js')
    
  </body>
</html>
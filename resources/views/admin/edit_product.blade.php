<!DOCTYPE html>
<html>
  <head> 
        @include('admin.css')

        <style>
            .page-header {
                background: #22252a;
            }

            .add_product_form {

            }

            .div_deg {
                display: flex;
                justify-content: center;
                align-items: center;

            }

            .app_product_form {
                width: 
            }

            .input_deg {
                min-width: 200px;
                height: 40px;
                border: 1px solid firebrick;
                border-radius: 15px;
                box-shadow: 0px 0px 6px #db6574;
                padding:  0px 12px;
            }

            .text_area_deg {
                padding: 10px 10px;
                font-size: 16px;
            }
            select {
                width: 200px;
                outline: 0;
                padding: 8px 15px;
            }
            form label {
                color: white;
                font-size: 18px;
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
                    <h1 style="color: white;">Edit Product</h1>
                    <div class="div_deg">
                        <form action="{{url('update_product', $product)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-2">
                                <label>Product Title</label><br>
                                <input class="input_deg" type="text" name="title" value="{{$product->title}}" required/>
                            </div>
                            <div class="mb-2">
                                <label>Price</label><br>
                                <input class="input_deg" type="text" name="price" value="{{$product->price}}"required/>
                            </div>
                            <div class="mb-2">
                                <label>Quantity</label><br>
                                <input class="input_deg" type="number" name="quantity" value="{{$product->quantity}}" required/>
                            </div>
                            <div class="mb-2">
                                <label>Product Category</label><br>
                                <select name="category" placeholder="Select a option">
                                    <option value="#">Select a option</option>
                                    @foreach ($categories as $category )
                                        <option value="{{$category->name}}" 
                                            @if($product->category === $category->name)
                                                selected
                                            @endif
                                        >
                                            {{$category->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-2">
                                <label>Current Product Image</label><br>
                                <img src="/product_images/{{$product->image}}" alt="Product image" width="200px" class="img-thumbnail">
                            </div>
                            <div class="mb-2">
                                <label>New Product Image</label><br>
                                <input type="file" name="image">
                            </div>
                            <div class="mb-2">
                                <label>Description</label><br>
                                <textarea name="description" cols="20" rows="2" class="text_area_deg">
                                    {{ $product->description }}
                                </textarea>
                            </div>
                            <div class="mb-2">
                                <input type="submit" value="Update Product" class="btn btn-success" >
                            </div>
                        </form>
                    </div>
                </div>
            </div>
       </div>
    </div>


    <!-- JavaScript files-->
        @include('admin.js')
  </body>
</html>
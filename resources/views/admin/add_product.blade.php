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
                    <h1 style="color: white;">Add Product</h1>
                    <div class="div_deg">
                        <form action="upload_product" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-2">
                                <label>Product Title</label><br>
                                <input class="input_deg" type="text" name="title" required/>
                            </div>
                            <div class="mb-2">
                                <label>Price</label><br>
                                <input class="input_deg" type="number" name="price" required/>
                            </div>
                            <div class="mb-2">
                                <label>Quantity</label><br>
                                <input class="input_deg" type="number" name="quantity" required/>
                            </div>
                            <div class="mb-2">
                                <label>Product Category</label><br>
                                <select name="category" placeholder="Select a option">
                                    <option value="#">Select a option</option>
                                    @foreach ($categories as $category )
                                        <option value="{{$category->name}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-2">
                                <label>Product Image</label><br>
                                <input type="file" name="image"/>
                            </div>
                            <div class="mb-2">
                                <label>Description</label><br>
                                <textarea name="description" rows="5" class="text_area_deg"></textarea>
                            </div>
                            <div class="mb-2">
                                <input type="submit" value="Add Product" class="btn btn-success" >
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
<!DOCTYPE html>
<html>
  <head> 
        @include('admin.css')

        <style>
            .page-content {
                background: #2d3035;
            }

            .div_deg {
                display: flex;
                justify-content: center;
                align-items: center;
                margin: 30px;
            }

            input[type="text"] {
                width: 400px;
                height: 50px;
                border: 1px solid firebrick;
                border-radius: 15px;
                box-shadow: 0px 0px 6px #db6574;
                padding:  0px 12px;
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
                <h1 style="color: white;">Edit Category</h1>

                <div class="div_deg">       
                    <form action="{{route('update_category', $data)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div>
                            <input type="text" name="name" value="{{$data->name}}">
                            <input type="submit" value="Update" class="btn btn-primary">
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
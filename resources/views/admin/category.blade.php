<!DOCTYPE html>
<html>
  <head> 
        @include('admin.css')

        <style>
            input[type="text"] {
                border: 1px solid firebrick;
                border-radius: 20px;
                box-shadow: 0px 0px 6px #db6574;
                padding:  9px 12px;
            }

            .div_deg {
                display: flex;
                justify-content: center;
                align-items: center;
                margin: 30px;

                width: 100%;
            }

            .tb_deg {
                color: white;
                box-shadow: 0px 0px 6px #db6574;
                border: 1px solid #db6574;
                width: 50%;
                min-width: 200px;
            }
            
            .tb_deg tr th{
                font-size: 20px;
                padding: 10px 20px;
                text-align: center;
                background: #f18090;
            }

            .tb_deg tr td {
                font-size: 18px;
                padding: 10px 20px;
            }

            .page-content {
                background: #2d3035;
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
                    <h1 style="color: white;">Add Category</h1>
                    <div class="div_deg">       
                        <form action="/add_category" method="POST">
                            @csrf
                            <div>
                                <input type="text" name="category_name" placeholder="Enter Category Name">
                                <input type="submit" value="Add" class="btn btn-primary ms-6">
                            </div>
                        </form>
                    </div>
                    <div class="div_deg div_deg_sec">
                        <table class="tb_deg">
                            <tr>
                                <th colspan="3">Category List</th>
                            </tr>

                            @foreach ($categories as $category)
                            <tr>
                                <td>{{ $category->name }}</td>
                                <td class="text-right" width="20%">
                                        <a type="submit" class="btn btn-success btn-sm" href="{{route('edit_category', $category)}}">
                                            Edit
                                        </a>
                                </td>
                                <td class="text-right" width="20%">
                                    <form action="{{ route('delete_category', $category) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this category?')">
                                            Delete
                                        </button>
                                    </form>
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
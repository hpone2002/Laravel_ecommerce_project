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
                    <h1 class="mb-6">View Users</h1>
                    <div>
                        <table boder="3"  cellpadding="10px" class="table table-striped table-bordered text-center">
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>User_Type</th>
                            </tr>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->phone}}</td>
                                    <td>{{$user->address}}</td>
                                    <td>{{$user->user_type}}</td>
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
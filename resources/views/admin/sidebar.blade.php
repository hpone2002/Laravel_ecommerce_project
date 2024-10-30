<nav id="sidebar">
    <!-- Sidebar Header-->
    <div class="sidebar-header d-flex align-items-center">
      <div class="avatar"><img src="{{asset('admin_css/img/avatar-6.jpg')}}" alt="..." class="img-fluid rounded-circle"></div>
      <div class="title">
        <h1 class="h5">Mark Stephen</h1>
        <p>Web Designer</p>
      </div>
    </div>
    <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
    <ul class="list-unstyled">
            <li><a href="/login_home"><i class="icon-home"></i>Home</a></li>
            <li><a href="/admin/dashboard"> <i class="icon-home"></i>Admin Dashboard</a></li>
            <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-windows"></i>Your Products</a>
              <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                <li><a href="/add_product">Add Product</a></li>
                <li><a href="/view_product">View Product</a></li>
                <li><a href="/view_category">Product Category</a></li>
              </ul>
            </li>
            <li><a href="/view_order"> <i class="icon-windows"></i>Orders </a></li>
            <li><a href="/view_users"> <i class="icon-user"></i>All Users</a></li>
    </ul>
  </nav>
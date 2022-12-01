@php
  $setting=DB::table('settings')->first();
@endphp
<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ url($setting->favicon) }}" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Admin | Ecommerce</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTdDXECBv76wa78obNrJNqayP3o7cy4RaZNg_l_YuhSzP6qoWuHr6BTtn8JgNuHFVmSaf4&usqp=CAU" class="img-circle elevation-2">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="{{ route('admin.home') }}" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                {{-- <i class="right fas fa-angle-left"></i> --}}
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link active">
              <i class="nav-icon far fa-plus-square"></i>
              <p>
                Product
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon far fa-circle text-danger"></i>
                  <p class="text">All Product</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('product.create') }}" class="nav-link">
                  <i class="nav-icon far fa-circle text-danger"></i>
                  <p class="text">Add Product</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('page.index') }}" class="nav-link">
                  <i class="nav-icon far fa-circle text-danger"></i>
                  <p class="text">Manage Product</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-header">Divison</li>
          <li class="nav-item">
            <a href="{{ route('category.index') }}" class="nav-link">
              <i class="nav-icon far fa-circle text-danger"></i>
              <p class="text">Catgeory</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('subcategory.index') }}" class="nav-link">
              <i class="nav-icon far fa-circle text-info"></i>
              <p>Sub Category</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('childcategory.index') }}" class="nav-link">
              <i class="nav-icon far fa-circle text-warning"></i>
              <p class="text">Child Catgeory</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('brand.index') }}" class="nav-link">
              <i class="nav-icon far fa-circle text-success"></i>
              <p>Brand</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('warehouse.index') }}" class="nav-link">
              <i class="nav-icon far fa-circle text-primary"></i>
              <p>Warehouse</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link active">
              <i class="nav-icon far fa-plus-square"></i>
              <p>
                Offer
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('coupon.index') }}" class="nav-link">
                  <i class="nav-icon far fa-circle text-danger"></i>
                  <p class="text">Coupon</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('page.index') }}" class="nav-link">
                  <i class="nav-icon far fa-circle text-danger"></i>
                  <p class="text">E Campaign</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link active">
              <i class="nav-icon far fa-plus-square"></i>
              <p>
                Pickup Point
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('pickuppoint.index') }}" class="nav-link">
                  <i class="nav-icon far fa-circle text-danger"></i>
                  <p class="text">Index</p>
                </a>
              </li>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link active">
              <i class="nav-icon far fa-plus-square"></i>
              <p>
                Settings
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('setting.seo') }}" class="nav-link">
                  <i class="nav-icon far fa-circle text-danger"></i>
                  <p class="text">SEO Setting</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('page.index') }}" class="nav-link">
                  <i class="nav-icon far fa-circle text-danger"></i>
                  <p class="text">Page Management</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('setting.website') }}" class="nav-link">
                  <i class="nav-icon far fa-circle text-danger"></i>
                  <p class="text">Website Setting</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index.html" class="nav-link">
                  <i class="nav-icon far fa-circle text-danger"></i>
                  <p class="text">SMTP Setting</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index.html" class="nav-link">
                  <i class="nav-icon far fa-circle text-danger"></i>
                  <p class="text">Payment Gateway</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-header">Profile</li>
          <li class="nav-item">
            <a href="{{ route('admin.password.change') }}" class="nav-link">
              <i class="fas fa-circle nav-icon"></i>
              <p>Password Change</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.logout') }}" class="nav-link">
              <i class="fas fa-circle nav-icon"></i>
              <p>Logout</p>
            </a>
          </li>

          <li class="nav-header">Data</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-circle text-danger"></i>
              <p class="text">Add Catgeory</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-circle text-warning"></i>
              <p>All Category</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-circle text-info"></i>
              <p>Informational</p>
            </a>
          </li>  
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

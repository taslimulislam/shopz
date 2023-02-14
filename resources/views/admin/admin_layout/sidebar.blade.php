 <!-- Sidebar  -->
 <nav class="sidebar sidebar-bunker">
     <div class="sidebar-header">
         <a href="{{route('admin.dashboard')}}" class="sidebar-brand">
             <img class="sidebar-brand_icon" src="{{asset('admin/assets/dis1t/img/logo.png')}}" alt="">
         </a>
     </div>
     <div class="sidebar-body">
         <nav class="sidebar-nav">
            <ul class="metismenu">
                <li class="nav-label">
                     <span class="nav-label_text">Main Menu</span>
                     <small class="ti-more-alt nav-label_ellipsis"></small>
                </li>
                <li class="{{ Request::segment(2) == 'dashboard'? 'mm-active': ''}}">
                     <a href="{{route('admin.dashboard')}}">
                         <i class="ti-home"></i> Dashboard
                     </a>
                </li>
                
                 <li class="{{ Request::segment(2) == 'product'? 'mm-active': ''}}">
                     <a class="has-arrow material-ripple" href="#">
                         <i class="ti-comments"></i> Product
                         
                     </a>
                     <ul class="nav-second-level">
                         
                         <li class="{{Request::segment(2) == 'product' ? 'mm-active': ''}}"><a href="{{ route('admin.product.create') }}">Product List</a></li>
                         <li class="{{Request::segment(2) == 'product-category' ? 'mm-active': ''}}"><a href="{{ route('admin.product-category.index') }}">Product Category</a></li>
                         <li class="{{Request::segment(2) == 'product-unit' ? 'mm-active': ''}}"><a href="{{ route('admin.product-unit.index') }}">Product Unit</a></li>
                         
                     </ul>
                </li> 

                <li class="{{Request::segment(2) == 'supplier' ? 'mm-active': ''}}"><a href="{{ route('admin.supplier.index') }}"><i class="ti-user"></i>Suppliers</a></li>
                <li class="{{Request::segment(2) == 'adduser' && Request::segment(3) == 'index' ? 'mm-active': ''}}"><a href="{{ route('admin.adduser.register') }}"><i class="ti-user"></i>Users</a></li>
                 
             </ul>
         </nav>
     </div>
     <!-- sidebar-body -->
 </nav>
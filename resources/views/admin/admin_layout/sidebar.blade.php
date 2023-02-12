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
                         {{-- <li class="{{Request::segment(2) == 'blog-category' && Request::segment(3) == 'index' ? 'mm-active': ''}}"><a href="#">Blog Category</a></li> --}}
                         
                     </ul>
                </li> 
                
<!--                  
                <li class="{{Request::segment(2) == 'menu' && Request::segment(3) == 'index' ? 'mm-active': ''}}"><a href="#"><i class="ti-menu-alt"></i>Web Menu</a></li>
                <li class="{{Request::segment(2) == 'mobile' && Request::segment(3) == 'index' ? 'mm-active': ''}}"><a href="#"><i class="ti-mobile"></i>Mobile</a></li>
                <li class="{{Request::segment(2) == 'banner' && Request::segment(3) == 'index' ? 'mm-active': ''}}"><a href="#"><i class="ti-image"></i>Banner</a></li>
                <li class="{{Request::segment(2) == 'service' && Request::segment(3) == 'index' ? 'mm-active': ''}}"><a href="#"><i class="fa fa-handshake"></i>Services</a></li>
                <li class="{{Request::segment(2) == 'about' && Request::segment(3) == 'create' ? 'mm-active': ''}}"><a href="#"><i class="ti-shine"></i>About</a></li> 
                <li class="{{Request::segment(2) == 'web-setting' && Request::segment(3) == 'edit'? 'mm-active': ''}}"><a href="#"><i class="ti-settings"></i>Web Setting</a></li>-->
                <li class="{{Request::segment(2) == 'adduser' && Request::segment(3) == 'index' ? 'mm-active': ''}}"><a href="{{ route('admin.adduser.register') }}"><i class="ti-user"></i>Users</a></li>
                 
             </ul>
         </nav>
     </div>
     <!-- sidebar-body -->
 </nav>
<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.admin_layout.head')
</head>

<body class="fixed sidebar-mini">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-green">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <div class="wrapper">
        @include('admin.admin_layout.sidebar')
        <!-- Page Content  -->
        <div class="content-wrapper">
            <div class="main-content">
                @include('admin.admin_layout.header')
                @yield('admin_content')


            </div>
            <!--/.main content-->
            @include('admin.admin_layout.footer')
        </div>
        <!--/.wrapper-->
    </div>
    @include('admin.admin_layout.admin_js')

</body>

</html>
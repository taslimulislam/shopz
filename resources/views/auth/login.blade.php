<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Bootstrap 4 Admin &amp; Dashboard Template">
    <meta name="author" content="Bdtask">
    <title>Gbank - Login</title>
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('admin/assets/dist/img/favicon.png')}}">
    <!--Global Styles(used by all pages)-->
    <link href="{{asset('admin/assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <!--<link href="assets/plugins/bootstrap/css/bootstrap.rtl.min.css" rel="stylesheet">-->
    <link href="{{asset('admin/assets/plugins/metisMenu/metisMenu.css')}}" rel="stylesheet">
    <!--<link href="assets/plugins/metisMenu/metisMenu-rtl.css" rel="stylesheet">-->
    <link href="{{asset('admin/assets/plugins/fontawesome/css/all.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/assets/plugins/typicons/src/typicons.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/assets/plugins/themify-icons/themify-icons.min.css')}}" rel="stylesheet">
    <!--Third party Styles(used by this page)-->

    <!--Start Your Custom Style Now-->
    <link href="{{asset('admin/assets/dist/css/black-gray.css')}}" rel="stylesheet">
    <!--    <link href="assets/dist/css/style-new.css" rel="stylesheet">-->
    <!-- <link href="assets/dist/css/style.css" rel="stylesheet"> -->
    <!--<link href="assets/dist/css/style.rtl.css" rel="stylesheet">-->
</head>

<body>
    <div class="d-flex align-items-center justify-content-center text-center h-100vh ">
        <div class="form-wrapper m-auto position-relative">
            <div class="form-container my-4">

                <div class="panel">
                    <div class="align-items-center d-flex">
                        <!-- <div class="d-md-block d-none me-5" style="max-width: 400px">
                            <img src="{{asset('admin/assets/dist/img/login-left.png')}}" class="img-fluid" alt="">
                        </div> -->
                        <div class="d-block login_box">
                            <div class="panel-header text-center mb-5">
                                <div class="register-logo text-center mb-3">
                                    <!-- <a href="index.html"><img src="{{asset('admin/assets/dist/img/logo.png')}}"
                                            alt=""></a> -->
                                </div>
                                <h5 class="">Admin Sign In</h5>
                            </div>
                            @if ($errors->any())
                            <div class="alert alert-danger" style="margin-left: 45px;margin-right: 45px;">
                                <div class="mb-4 position-relative">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            @endif
                            <form method="POST" action="{{ route('login') }}" class="register-form">
                                @csrf
                                <div class="mb-3 text-start">
                                    <label for="text" class="mb-2 text-muted">User Name</label>
                                    <input type="text" class="form-control" name="email" id="text"
                                        placeholder="Username">
                                    <div class="invalid-feedback text-start">Enter your valid email</div>
                                </div>
                                <div class="mb-3 text-start">
                                    <label for="pass" class="mb-2 text-muted">Password</label>
                                    <input type="password" name="password" class="form-control" id="pass"
                                        placeholder="Password">
                                </div>
                                <button type="submit" class="btn text-white w-100 mt-2"
                                    style="background: #F5001B;line-height: 30px;">Login</button>
                                <div class="d-flex flex-wrap justify-content-between mt-2 text-muted">
                                    <a href="forgot_pw.html" class="text-muted">Forgot Password</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.End of form wrapper -->
    <!--Global script(used by all pages)-->
    <script src="{{asset('admin/assets/plugins/jQuery/jquery.min.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/metisMenu/metisMenu.min.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/perfect-scrollbar/dist/perfect-scrollbar.min.js')}}"></script>
    <!-- Third Party Scripts(used by this page)-->

    <!--Page Active Scripts(used by this page)-->

    <!--Page Scripts(used by all page)-->
    <script src="{{asset('admin/assets/dist/js/sidebar.js')}}"></script>
</body>

</html>


@extends('admin.admin_layout.admin_main')
@section('admin_content')

<div class="body-content">
    <div class="row g-3 mb-3">
        <div class="col-lg-6 col-xl-4 col-xxl-3 d-flex">
            <div class="bg_red card w-100">
                <div class="align-items-center card-body d-flex justify-content-center">
                    <div class="row text-center">
                        <div class="col-12 text-white">
                            <h4 class="mb-2 fw-bold">Account</h4>
                            <p class="mb-2 fs-18">Welcome Back, {{ auth()->user()->name }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-xl-4 col-xxl-3 d-flex">
            <div class="card w-100">
                <div class="card-body px-0 py-4">
                    <div class="row">
                        <div class="col-12">
                            <div class="border-bottom d-block px-4">
                                <h1 class="fw-semi-bold mb-2"></h1>
                                <p class="fs-18 mb-2 text-muted" style="padding: 8px;">  </p>
                                <h5 class="fw-semi-bold">Total Blogs</h5>
                            </div>
                            <a href="#">
                            <div class="d-block px-4">
                                <h6 class="mb-0 mt-3" style="color: black;">-> All blogs</h6>
                            </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-xl-4 col-xxl-3 d-flex">
            <div class="card w-100">
                <div class="card-body px-0 py-4">
                    <div class="row">
                        <div class="col-12">
                            <div class="border-bottom d-block px-4">
                            <h1 class="fw-semi-bold mb-2"></h1>
                            <p class="fs-18 mb-2 text-muted" style="padding: 8px;">  </p>
                            <h5 class="fw-semi-bold">Total Services</h5>
                            </div>
                            <a href="#">
                            <div class="d-block px-4">
                                <h6 class="mb-0 mt-3" style="color: black;">-> All Services</h6>
                            </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-xl-4 col-xxl-3 d-flex">
            <div class="card w-100">
                <div class="card-body px-0 py-4">
                    <div class="row">
                        <div class="col-12">
                            <div class="border-bottom d-block px-4">
                                <h1 class="fw-semi-bold mb-2"></h1>
                                <p class="fs-18 mb-2 text-muted" style="padding: 8px;">  </p>
                                <h5 class="fw-semi-bold">Total Banners</h5>
                            </div>
                            <a href="#">
                            <div class="d-block px-4">
                                <h6 class="mb-0 mt-3" style="color: black;">-> All Banners</h6>
                            </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/.body content-->
@endsection
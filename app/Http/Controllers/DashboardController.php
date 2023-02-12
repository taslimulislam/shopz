<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){

        // $allbogs = Blog::count();
        // $allserv = Service::count();
        // $allbanner = Banner::count();
        return view('admin.admin_dashboard.home'); 
    }
}

<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard_admin()
    {
        return view('dashboard.dashboard-admin');
    }

    public function dashboard_client()
    {
        return view('dashboard.dashboard-client');
    }
    
}
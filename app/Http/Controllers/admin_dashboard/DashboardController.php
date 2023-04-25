<?php

namespace App\Http\Controllers\admin_dashboard;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\order;
use App\Models\packages;
use App\Models\sub_category;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
   public function dashboard()
   {
    $totalCategories = category::count();
    $totalSubCategories = sub_category::count();
    $totalPackages = packages::count();

    $totalAllUsers = User::count();
    $totalAllUser = User::where('role_id','2')->count();
    $totalAllUser = User::where('role_id','3')->count();

    $todayDate = Carbon::now()->format('d-m-y');
    $thisMonth = Carbon::now()->format('m');
    $thisYear = Carbon::now()->format('y');

    $totalOrder = order::count();
    $todayOrder = order::whereDate('created_at', $todayDate)->count();
    $thisMonthOrder = order::whereMonth('created_at', $thisMonth)->count();
    $thisYearOrder = order::whereYear('created_at', $thisYear)->count();

    

    $thisMonthOrder = order::whereMonth('created_at', $thisMonth)->count();
    return view('backend.layout.dashboard',compact('totalCategories','totalSubCategories','totalPackages','totalAllUsers','totalAllUser','totalAllUser','totalOrder','todayOrder','thisMonthOrder','thisYearOrder'));
   }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Brand;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProduct  = Product::count();
        $totalCategories = Category::count();
        $totalBrand = Brand::count();


        $totalUserAll = User::count();
        $totalUser = User::where('role_as','0')->count();
        $totalAdmin = User::where('role_as','1')->count();

        $totalOrder = Order::count();
        $todayOrder = Order::whereDate('created_at',Carbon::now()->format('d-m-Y'))->count();
        $thisMonthOrder = Order::whereMonth('created_at',Carbon::now()->format('m'))->count();
        $thisYearOrder = Order::whereYear('created_at',Carbon::now()->format('Y'))->count();
       
        return view('admin.dashboard', compact('totalProduct','totalCategories','totalBrand','totalUserAll','totalUser','totalAdmin','totalOrder','todayOrder','thisMonthOrder','thisYearOrder'));
    }
}

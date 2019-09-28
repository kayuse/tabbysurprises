<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalOrders = Order::count();
        $totalPendingOrders = Order::where('is_confirmed', 0)->count();
        $totalAttendedOrders = Order::where('is_attended', 0)->count();
        $totalUpcomingOrders = Order::where('is_confirmed', 1)->where('is_attended', 0)->count();
        $fivePendingOrders = Order::where('is_confirmed', 0)->take(5);
        $fiveUpcomingOrders = Order::where('is_confirmed', 1)->where('is_attended', 0)->take(5);
        $data = compact('totalOrders', 'totalPendingOrders', 'totalAttendedOrders', 'totalUpcomingOrders', 'fivePendingOrders', 'fiveUpcomingOrders');

        return view('dashboard', $data);
    }
}

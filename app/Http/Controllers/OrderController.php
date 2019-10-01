<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //
    public function index(Request $request)
    {

    }

    public function pending(Request $request)
    {
        $orders = Order::where('is_confirmed', 0)->paginate(15);
        $data = compact('orders');
        return view('orders_pending', $data);
    }


    public function accepted(Request $request)
    {
        $orders = Order::where('is_confirmed', 1)->where('is_attended', 0)->paginate(15);
        $data = compact('orders');
        return view('orders_accepted', $data);
    }

    public function paid(Request $request)
    {
        $orders = Order::where('is_confirmed', 1)->where('payment_status', '>', 0)->where('is_attended', 0)->paginate(15);
        $data = compact('orders');
        return view('orders_paid', $data);
    }

    public function rejected(Request $request)
    {
        $orders = Order::where('is_confirmed', 2)->paginate(15);
        $data = compact('orders');
        return view('orders_rejected', $data);
    }

    public function completed(Request $request)
    {
        $orders = Order::where('is_confirmed', 1)->where('is_attended', 1)->paginate(15);
        $data = compact('orders');
        return view('orders_completed', $data);
    }


}

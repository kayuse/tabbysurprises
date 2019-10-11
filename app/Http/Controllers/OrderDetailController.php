<?php

namespace App\Http\Controllers;

use App\Events\OrderStatusChanged;
use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Repositories\OrderRepositoryInterface;

class OrderDetailController extends Controller
{
    protected $orderRepository;

    public function __construct(OrderRepositoryInterface $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    //
    public function index($id, Request $request)
    {
        try {
            $order = Order::find($id);
            $data = compact('order');
            return view('order', $data);
        } catch (\Exception $exception) {
            return redirect(route('dashboard'))->with('error', $exception->getMessage());
        }

    }

    public function confirm(Request $request)
    {
        try {
            $order = $this->orderRepository->confirm($request->order, $request->amount);
            $data = compact('order');
            return redirect(route('order', ['id' => $order->id]));
        } catch (\Exception $exception) {
            return redirect(route('dashboard'))->with('error', $exception->getMessage());
        }
    }

    public function cancel(Request $request)
    {
        try {
            $order = Order::find($request->order);
            $order->is_confirmed = 2;
            $order->save();
            event(new OrderStatusChanged($order));
            return redirect(route('order', ['id' => $order->id]));
        } catch (\Exception $exception) {
            return redirect(route('dashboard'))->with('error', $exception->getMessage());
        }
    }
}

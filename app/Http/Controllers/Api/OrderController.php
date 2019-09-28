<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Repositories\OrderRepository;

use App\Http\Controllers\Repositories\OrderRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    private $orderRepository;

    public function __construct(OrderRepositoryInterface $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    //
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'phonenumber' => 'required',
            'location' => 'required',
            'order.celebrant_name' => 'required',
            'order.celebration_address' => 'required',
            'order.celebration_type' => 'required',
            'order.celebration_time' => 'required|date_format:Y-m-d H:i:s',
            'order.services' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => 2, 'messages' => $validator->errors()], 401);
        }
        $order = $this->orderRepository->create($request->all());
        return response()->json(['status' => 1, 'data' => $order], 200);
    }

    public function get($id)
    {
        $order = $this->orderRepository->get($id);
        return response()->json(['status' => 1, 'data' => $order], 200);
    }
}

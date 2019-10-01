<?php

namespace App\Http\Controllers\Repositories;

use App\Client;
use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderRepository implements OrderRepositoryInterface
{
    protected $client;
    protected $order;

    public function __construct(Client $client, Order $order)
    {
        $this->client = $client;
        $this->order = $order;
    }

    //
    public function create($data)
    {
        $client = Client::where('email', $data['email'])->first();
        if ($client == null) {
            $client = Client::create(['email' => $data['email'], 'firstname' => $data['firstname'], 'lastname' => $data['lastname'], 'phonenumber' => $data['phonenumber'], 'location' => $data['location']]);

        }
        $orderData = $data['order'];
        $order = Order::create([
            'celebrant_name' => $orderData['celebrant_name'],
            'celebration_address' => $orderData['celebration_address'],
            'celebration_type' => $orderData['celebration_type'],
            'celebration_time' => $orderData['celebration_time'],
            'is_confirmed' => 0,
            'payment_status' => 0,
            'other' => $orderData['other'],
            'client_id' => $client->id
        ]);
        $services = $orderData['services'];
        $order->services()->attach($services);

        return $order;
    }

    public function confirm($id, $amount)
    {
        $order = Order::find($id);
        $order->amount = $amount;
        $order->is_confirmed = 1;
        $order->save();
        return $order;
    }

    public function get($id)
    {
        return Order::where('id', $id)->with('services')->first();
    }

    public function all()
    {
        // TODO: Implement all() method.
    }
}

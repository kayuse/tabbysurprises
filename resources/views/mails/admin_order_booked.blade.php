Hello Ife,

A Client {{$order->client->firstname}} just made an order. You may need to checkout the details at {{env('APP_URL').'order/'.$order->id}}

Cheers.

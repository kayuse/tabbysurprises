<?php

namespace App\Listeners;

use App\Events\OrderStatusChanged;
use App\Mail\OrderStatusChangeMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendOrderChangeNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  OrderStatusChangedMail $event
     * @return void
     */
    public function handle(OrderStatusChanged $event)
    {
        Mail::to($event->order->client->email)->send(new OrderStatusChangeMail($event->order));
        // Mail::to(env('APP_EMAIL'))->send(new SendAdminOrderBookedMail($event->order));
    }
}

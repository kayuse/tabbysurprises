<?php

namespace App\Listeners;

use App\Events\OrderBooked;
use App\Mail\SendAdminOrderBookedMail;
use App\Mail\SendOrderBookedMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendOrderBookingNotification
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
     * @param  OrderBooked $event
     * @return void
     */
    public function handle(OrderBooked $event)
    {
        //
        Mail::to($event->order->client->email)->send(new SendOrderBookedMail($event->order));
        Mail::to(env('APP_EMAIL'))->send(new SendAdminOrderBookedMail($event->order));
    }
}

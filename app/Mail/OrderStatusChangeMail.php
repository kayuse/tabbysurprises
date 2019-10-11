<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Order;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderStatusChangeMail extends Mailable
{
    use Queueable, SerializesModels;
    public $order;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if ($this->order->is_confirmed == 1) {
            $minimumFee = ceil($this->order->amount / 2);
            $data = compact('minimumFee');
            return $this->subject('Tabby Surprises, Order Accepted')
                ->from('info@tabbysurprises.com', 'Tabby Surprises')->view('mails.client_order_confirmed', $data);
        }
        return $this->subject('Tabby Surprises, Order Declined')
            ->from('info@tabbysurprises.com', 'Tabby Surprises')->view('mails.client_order_cancel');
    }
}

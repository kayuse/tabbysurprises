<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    public $fillable = [
        'celebrant_name', 'celebration_address', 'celebration_type', 'celebration_time', 'other', 'is_confirmed', 'payment_status', 'client_id'
    ];

    public static function totalOrders()
    {
        return self::count();
    }

    public function services()
    {
        return $this->belongsToMany('App\Service', 'order_services');
    }

    public function formattedCelebrationTime()
    {
        return "hi";
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}

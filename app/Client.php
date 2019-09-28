<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    //
    public $fillable = [
        'email', 'firstname', 'lastname', 'location', 'phonenumber'
    ];
}

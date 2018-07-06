<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function payment()
    {
        return $this->belongsTo('App\Payment');
    }

    public function orderItems()
    {
        return $this->hasMany('App\OrderItem');
    }

    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }

}

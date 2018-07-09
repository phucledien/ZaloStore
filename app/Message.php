<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}

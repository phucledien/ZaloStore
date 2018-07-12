<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'name',
        'phone',
        'userId',
        'address',
        'districtName',
        'cityName'
    ];
    
    public function orders()
    {
        return $this->hasMany('App\Order');
    }

    public function messages()
    {
        return $this->hasMany('App\Message');
    }
}

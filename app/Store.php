<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $fillable = [
        'name',
        'oa_id',
        'oa_secret'
    ];

    public function users()
    {
        return $this->hasMany('App\User');
    }
}

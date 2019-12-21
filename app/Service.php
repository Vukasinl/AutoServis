<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'services';
    protected $guarded = [];

    public function customer(){
        return $this->belongsTo(\App\Customer::class);
    }
}

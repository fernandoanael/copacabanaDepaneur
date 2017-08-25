<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function employee(){
        return $this->belongsTo('App\Employee');
    }
    
    public function products(){
        return $this->belongsToMany('App\Product','orders_products')->withPivot('quantity');
    }

}

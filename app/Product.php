<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function stock(){
        return $this->hasOne('App\Stock');
    }
    
    public function orders(){
        return $this->belongsToMany('App\Order','orders_products')->withPivot('quantity');
    }
}

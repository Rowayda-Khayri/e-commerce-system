<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Order extends Model
{
    use SoftDeletes;

    
    // relations :
    
    public function users(){
        
        return $this->belongsTo(User::class);

    }
    
    // relations :
    
    public function ordersItems(){
        
        return $this->hasMany(Order_item::class);
    }
    
    
}

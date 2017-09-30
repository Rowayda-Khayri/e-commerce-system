<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order_item extends Model
{
    use SoftDeletes;
    // relations :
    
    public function orders(){
        
        return $this->belongsTo(Order::class);
    }
    
    
    // relations :
    
    public function items(){
        
        return $this->belongsTo(Item::class);
    }
    
}

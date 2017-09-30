<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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

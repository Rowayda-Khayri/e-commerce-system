<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    
    // relations :
    
    public function ordersItem(){
        
        return $this->hasMany(Order_item::class);
    }
    
    // relations :
    
    public function subcategories(){
        
        return $this->belongsTo(Subcategory::class);
    }
    
    
}

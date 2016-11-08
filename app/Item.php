<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    use SoftDeletes;
    // relations :
    
    public function ordersItem(){
        
        return $this->hasMany(Order_item::class);
    }
    
    // relations :
    
    public function subcategories(){
        
        return $this->belongsTo(Subcategory::class);
    }
    
    
}

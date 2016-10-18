<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    
    // relations :
    
    public function items(){
        
        return $this->hasMany(Item::class);
    }
  
    // relations :
    
    public function categories(){
        
        return $this->belongsTo(Category::class);
    }
}
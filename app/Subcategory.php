<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subcategory extends Model
{
    use SoftDeletes;
    
    // relations :
    
    public function items(){
        
        return $this->hasMany(Item::class);
    }
  
    // relations :
    
    public function categories(){
        
        return $this->belongsTo(Category::class);
    }
}

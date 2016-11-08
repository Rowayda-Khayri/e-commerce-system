<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    
    // relations :
    
    public function subcategories(){
        
        return $this->hasMany(Subcategory::class);
    }
}

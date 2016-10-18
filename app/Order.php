<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    
    
    // relations :
    
    public function users(){
        
        return $this->belongsTo(User::class);

    }
    
    
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_type extends Model
{
    
    
    // relations :
    
    public function users(){
        
        return $this->hasMany(User::class);
    }
    
    
}
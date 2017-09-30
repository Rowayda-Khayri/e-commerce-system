<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\SoftDeletes;


class User extends Authenticatable
{
    
        use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password','phone','user_type_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    
    // relations :
    
    public function orders(){
        
        return $this->hasMany(Order::class);
    }
    
    // relations :
    
    public function userTypes(){
        
        return $this->belongsTo(User_type::class);
    }
    
}

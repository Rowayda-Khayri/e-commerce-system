<?php

use Illuminate\Database\Seeder;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


use App\User_type;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        User::firstOrCreate([
        'id' => 1,
        'username' => 'admin',
        'email' => 'admin@mail.com',
        'password' => \Hash::make('secret'), 
        'status'=>1,
         'user_type_id' => 1,    
        ]);
        
        
    }
}

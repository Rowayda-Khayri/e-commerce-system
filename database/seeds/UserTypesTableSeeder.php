<?php

use Illuminate\Database\Seeder;

use Illuminate\Database\Eloquent\Model;

use App\User_type;

use Carbon\Carbon;

class UserTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        
        User_type::firstOrCreate([
        'id' => 1,
        'value' => 'admin',
        ]);
        User_type::firstOrCreate([
            'id' => 2,
            'value' => 'customer',
        ]);
       
    
        
    }
}

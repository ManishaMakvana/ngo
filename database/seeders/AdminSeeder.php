<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Insert multiple admin records into the admins table
      Admin::updateOrCreate(
            ['username' => 'manisha'], // Unique field to check
            [
                'password' => Hash::make('manisha1'),
                'updated_at' => now(),
                'created_at' => now(),
            ]
        );

        
        Admin::updateOrCreate(
            ['username' => 'dhruv'], // Unique field to check
            [
                'password' => Hash::make('saidava'),
                'updated_at' => now(),
                'created_at' => now(),
            ]
        );


       
        
    }
}

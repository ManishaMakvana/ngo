<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'username' => 'darshna',
                'password' => Hash::make('darshna123'),
                'programid' => 1,
            ],
            [
                'username' => 'khushbu',
                'password' => Hash::make('khushbu456'),
                'programid' => 2,
            ],
            [
                'username' => 'disha',
                'password' => Hash::make('disha789'),
                'programid' => 3,
            ],
            [
                'username' => 'bhaven',
                'password' => Hash::make('bhaven101'),
                'programid' => 4,
            ],

            [
                'username' => 'nisha',
                'password' => Hash::make('nisha102'),
                'programid' => 5,
            ],
        ];

         // Insert new users and update existing ones
         foreach ($users as $user) {
            User::updateOrCreate(
                ['username' => $user['username']], // Check for existing username
                [
                    'password' => $user['password'],
                    'programid' => $user['programid'],
                ]
            );
        }
    }
}

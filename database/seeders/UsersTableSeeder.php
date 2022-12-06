<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $users = [
            [
                'id'             => 1,
                'name'           => 'Super Admin',
                'email'          => 'super@admin.com',
                'password'       => bcrypt('password'),
                'role_as'       => 1,
                'remember_token' => null,
                
            ],
            [
                'id'             => 2,
                'name'           => 'Admin',
                'email'          => 'admin@admin.com',
                'password'       => bcrypt('password'),
                'role_as'       => 1,
                'remember_token' => null,
                
            ],
            [
                'id'             => 3,
                'name'           => 'User',
                'email'          => 'user@user.com',
                'password'       => bcrypt('password'),
                'role_as'       => 0,
                'remember_token' => null,
            ],
        ];

        User::insert($users);
    }
}

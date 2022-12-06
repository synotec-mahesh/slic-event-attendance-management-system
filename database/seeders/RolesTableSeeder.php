<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'id'    => 1,
                'title' => 'super-admin',
            ],
            [
                'id'    => 2,
                'title' => 'admin',
            ],
            [
                'id'    => 3,
                'title' => 'user',
            ],
        ];

        Role::insert($roles);
    }
}

<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::find(1)->permissions()->attach([1,2,3]);

        Role::find(2)->permissions()->attach([2,3]);
        
        Role::find(3)->permissions()->attach(3);
    }
}

<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = [
            [
                'category_name'    => 'Advisor Code',
                'coloum_name' => 'advisor_code',
            ],
            [
                'category_name'    => 'Group Leader Code',
                'coloum_name' => 'group_leader_code',
            ],
            [
                'category_name'    => 'Team Leader Code',
                'coloum_name' => 'team_leader_code',
            ],
        ];

        Category::insert($category);
    }
}

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
                'id'             => 1,
                'category_name'    => 'Advisor / BSO Code',
                'coloum_name' => 'advisor_code',
                'input_text' => 'Advisor / BSO Code',

            ],
            [
                'id'             => 2,
                'category_name'    => 'Team Leader Code',
                'coloum_name' => 'team_leader',
                'input_text' => 'Team Leader Code',

            ],
            [
                'id'             => 3,
                'category_name'    => 'Group Leader Code',
                'coloum_name' => 'group_leader',
                'input_text' => 'Group Leader Code',

            ],
            [
                'id'             => 4,
                'category_name'    => 'EPF',
                'coloum_name' => 'epf',
                'input_text' => 'EPF',

            ],
        ];

        Category::insert($category);
    }
}

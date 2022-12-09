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
                'category_name'    => 'Advisor',
                'coloum_name' => 'advisor_code',
                'input_text' => 'Advisor Code',

            ],
            [
                'id'             => 2,
                'category_name'    => 'Bancassurance Sales Officer',
                'coloum_name' => 'bancassurance_sales_officer',
                'input_text' => 'Bancassurance Sales Officer Code',

            ],
            [
                'id'             => 3,
                'category_name'    => 'Team Leader',
                'coloum_name' => 'team_leader',
                'input_text' => 'Team Leader Code',

            ],
            [
                'id'             => 4,
                'category_name'    => 'Group Leader',
                'coloum_name' => 'group_leader',
                'input_text' => 'Group Leader Code',

            ],
            [
                'id'             => 5,
                'category_name'    => 'Marketing Executive / APM / PM',
                'coloum_name' => 'marketing_executive',
                'input_text' => 'Marketing Executive/APM/PM Code',

            ],
            [
                'id'             => 6,
                'category_name'    => 'Branch Manager',
                'coloum_name' => 'branch_manager',
                'input_text' => 'Branch Manager Code',

            ],
            [
                'id'             => 7,
                'category_name'    => 'Regional Manager',
                'coloum_name' => 'regional_manager',
                'input_text' => 'Regional Manager Code',

            ],
            [
                'id'             => 8,
                'category_name'    => 'Head Office Unit',
                'coloum_name' => 'head_office_unit',
                'input_text' => 'Head Office Unit Code',

            ],

        ];

        Category::insert($category);
    }
}

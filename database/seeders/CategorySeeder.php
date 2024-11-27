<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['category_name' => 'Electronics'],
            ['category_name' => 'Fashion'],
            ['category_name' => 'Home Appliances'],
            ['category_name' => 'Books'],
            ['category_name' => 'Sports'],
        ];

        Category::insert($categories);
    }
}

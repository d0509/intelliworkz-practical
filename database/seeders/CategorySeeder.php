<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Technology',
            ],
            [
                'name' => 'Food',
            ],
            [
                'name' => 'Astrology'
            ],
            [
                'name' => 'Chemicals',
            ],
            [
                'name' => 'Mechanics',
            ],
        ];

        Category::insert($categories);
    }
}

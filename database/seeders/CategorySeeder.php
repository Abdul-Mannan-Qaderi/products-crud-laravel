<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder

{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create 10 categories using the CategoryFactory
        Category::factory(10)->create();

    }
}

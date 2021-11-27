<?php

namespace Database\Seeders;

use App\Models\Category;
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
        Category::create(
            [
                'name' => 'Vegetable and Fruit'
            ]
        );

        Category::create(

            [
                'name' => 'Meat and Fish'
            ]
        );

        Category::create(
            [
                'name' => 'Dairy'
            ]
        );

        Category::create(
            [
                'name' => 'Frozen Food'
            ]
        );

        Category::create(
            [
                'name' => 'Tea & Coffee'
            ]
        );
    }
}
<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Brand::create(['name' => 'Bengal Meat']);
        Brand::create(['name' => 'Milk Vita']);
        Brand::create(['name' => 'Pran']);
        Brand::create(['name' => 'Aarong']);
        Brand::create(['name' => 'Golden Harvest']);
        Brand::create(['name' => 'Nestle']);
        Brand::create(['name' => 'Ispahani']);
    }
}
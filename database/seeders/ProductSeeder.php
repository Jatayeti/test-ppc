<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        Product::create(['name' => 'Headphones', 'price' => 100]);
        Product::create(['name' => 'Phone Case', 'price' => 20]);
        Product::create(['name' => 'Smartphone', 'price' => 500]);
        Product::create(['name' => 'Laptop', 'price' => 1000]);
        Product::create(['name' => 'Tablet', 'price' => 300]);
    }
}

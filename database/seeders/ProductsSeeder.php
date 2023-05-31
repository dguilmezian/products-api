<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'id_category' => 1,
            'id_brand' => 1,
            'image' => 'https://cdn-ipoint.waugi.com.ar/25280-large_default/macbook-air-13-apple-m2-chip-8-core-cpu-10-core-gpu-512gb-midnight.jpg',
            'description' => 'Apple MacBook Pro M2 model 2023',
            'name' => 'Apple MacBook Pro M2',
            'price' => 2000,
            'price_sale' => 1800,
            'stock' => 10,
        ]);

        Product::create([
            'id_category' => 1,
            'id_brand' => 2,
            'image' => 'https://buenosairesimport.com/4931-large_default/samsung-galaxy-book-pro-360-15.jpg',
            'description' => 'Samsung Galaxy Book Model 2023',
            'name' => 'Samsung Galaxy Book PRO 360',
            'price' => 1500,
            'price_sale' => 1300,
            'stock' => 15,
        ]);

        Product::create([
            'id_category' => 1,
            'id_brand' => 3,
            'image' => 'https://http2.mlstatic.com/D_NQ_NP_980108-MLA51244526315_082022-O.jpg',
            'description' => 'HP Elitebook 2023',
            'name' => 'HP Elitebook 849',
            'price' => 1200,
            'price_sale' => 1100,
            'stock' => 8,
        ]);
    }
}

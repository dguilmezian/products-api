<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;

class BrandsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = ['Apple', 'Samsung', 'HP'];

        foreach ($names as $name) {
            Brand::create(
                [
                    'name' => $name
                ]
            );
        }
    }
}

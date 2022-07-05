<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'user_id' => 1,
                'name' => 'Sari Roti',
                'slug' => Str::slug('Sari Roti'),
                'description' => 'Sari Roti rasa coklat',
                'price' => 4000,
                'amount' => 5,
                'path' => 'sari-roti.jpg',
                'created_at' =>  date('Y-m-d 11:i:s'),
            ],
            [
                'user_id' => 1,
                'name' => 'Air Mineral',
                'slug' => Str::slug('Air Mineral'),
                'description' => 'Air Mineral 600 ml',
                'price' => 5000,
                'amount' => 10,
                'path' => 'air-mineral.jpg',
                'created_at' =>  date('Y-m-d 10:i:s'),
            ],
            [
                'user_id' => 1,
                'name' => 'Oreo',
                'slug' => Str::slug('Oreo'),
                'description' => 'Oreo banyak varian',
                'price' =>10000,
                'amount' => 10,
                'path' => 'oreo.jpg',
                'created_at' =>  date('Y-m-d 09:i:s'),
            ],
        ];
        collect($data)->map(function ($item) {
            return Product::create($item);
        });
    }
}

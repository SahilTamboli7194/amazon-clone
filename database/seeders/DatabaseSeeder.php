<?php

namespace Database\Seeders;

use App\Models\CartProduct;
use App\Models\OrderProduct;
use App\Models\Review;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        OrderProduct::factory(1)->create();
        CartProduct::factory(1)->create();
        Review::factory(1)->create();
    }
}

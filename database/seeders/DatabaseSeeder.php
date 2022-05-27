<?php

namespace Database\Seeders;

use App\Models\CartProduct;
use App\Models\ColorProduct;
use App\Models\OrderProduct;
use App\Models\Review;
use App\Models\SellerProduct;
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
        OrderProduct::factory(10)->create();
        CartProduct::factory(10)->create();
        Review::factory(10)->create();
        ColorProduct::factory(10)->create();
        SellerProduct::factory(10)->create();
    }
}

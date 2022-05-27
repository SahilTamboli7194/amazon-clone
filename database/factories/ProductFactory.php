<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Offer;
use App\Models\SubCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->word(),
            'description'=>$this->faker->paragraph(),
            'price'=>$this->faker->numberBetween(100,10000),
            'img_path'=>$this->faker->sentence(),
            'category_id'=>Category::factory(),
            'sub_category_id'=>SubCategory::factory(),
            'brand_id'=>Brand::factory(),
            'offer_id'=>Offer::factory()
        ];
    }
}

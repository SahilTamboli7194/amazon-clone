<?php

namespace Database\Factories;

use App\Models\Coupon;
use App\Models\DeliveryAddress;
use App\Models\OrderStatus;
use App\Models\PaymentMode;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id'=>User::factory(),
            'delivery_address_id'=>DeliveryAddress::factory(),
            'payment_mode_id'=>PaymentMode::factory(),
            'coupon_id'=>Coupon::factory(),
            'order_status_id'=>OrderStatus::factory()
        ];
    }
}

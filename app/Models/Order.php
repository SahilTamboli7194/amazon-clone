<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function deliveryAddress()
    {
        return $this->belongsTo(DeliveryAddress::class);
    }

    public function paymentMode()
    {
        return $this->belongsTo(PaymentMode::class);
    }

    public function coupon()
    {
        return $this->belongsTo(Coupon::class);
    }

    public function ordeStatus()
    {
        return $this->belongsTo(OrderStatus::class);
    }

    public function orderProduct()
    {
        return $this->hasMany(Product::class);
    }
}

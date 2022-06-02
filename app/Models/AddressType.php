<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddressType extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function deliveryAddresses()
    {
        return $this->hasMany(DeliveryAddress::class);
    }
}

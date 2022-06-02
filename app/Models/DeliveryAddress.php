<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryAddress extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function addressType()
    {
        return $this->belongsTo(AddressType::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

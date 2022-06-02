<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellerProduct extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function sellers()
    {
        return $this->belongsToMany(Seller::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartProduct extends Model
{
    use HasFactory;
    protected $guarded=['id'];

    public function cart(){
        return $this->belongsTo(Cart::class);
    }

    public function prodcuts(){
        return $this->belongsTo(Product::class);
    }
}

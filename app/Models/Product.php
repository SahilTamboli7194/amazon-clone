<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded=['id'];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function subCategory(){
        return $this->belongsTo(SubCategory::class);
    }

    public function brand(){
        return $this->belongsTo(Brand::class);
    }

    public function offer(){
        return $this->belongsTo(Offer::class);
    }

    public function reviews(){
        return $this->hasMany(Review::class);
    }

    public function colors(){
        return $this->belongsToMany(Color::class,'color_prodcuts');
    }

    public function sellers(){
        return $this->belongsToMany(Seller::class,'seller_prodcuts');
    }
}

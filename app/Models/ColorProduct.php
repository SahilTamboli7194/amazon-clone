<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ColorProduct extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function colors()
    {
        return $this->belongsToMany(Color::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}

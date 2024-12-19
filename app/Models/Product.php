<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // protected $fillable = [
    //     'title',
    //     'slug',
    //     'price',
    //     'sku',
    //     'track_qty',
    //     'is_featured',
    //     'category_id',
    //     'qty'
    // ];

    use HasFactory;
    public function product_images()
    {
        return $this->hasMany(ProductImage::class);
    }
}

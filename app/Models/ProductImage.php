<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function images(): HasMany
    {
        return $this->hasMany(ProductImage::class);
    }
}

class ProductImage extends Model
{
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}

<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Product extends Model {
    protected $fillable = ['name', 'description', 'price'];

    // Relasi: satu produk punya banyak CartItem
    public function cartItems() {
        return $this->hasMany(CartItem::class);
    }
    // Relasi: satu produk punya banyak ProductImage
    public function images() {
        return $this->hasMany(ProductImage::class);
    }
}

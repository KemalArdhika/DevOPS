<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\CartItem;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->count(5)->create();

        Product::factory()->count(10)->create()->each(function ($product) {
            ProductImage::factory()
                ->count(2)
                ->create(['product_id' => $product->id]);
        });

        CartItem::factory()->count(20)->create();
    }
}
<?php
namespace Database\Factories;

use App\Models\ProductImage;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductImageFactory extends Factory
{
    protected $model = ProductImage::class;

    public function definition()
    {
        return [
            'image_url' => 'products/' . $this->faker->imageUrl( 640, 480, null, false),
            'product_id' => null, // set in seeder
        ];
    }
}
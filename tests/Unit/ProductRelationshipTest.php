<?php

namespace Tests\Unit;

use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductRelationshipTest extends TestCase
{
    use RefreshDatabase;

    public function test_product_has_many_images()
    {
        $product = Product::factory()->create();
        $image = ProductImage::factory()->create(['product_id' => $product->id]);

        $this->assertTrue($product->images->contains($image));
    }

    public function test_product_image_belongs_to_product()
    {
        $product = Product::factory()->create();
        $image = ProductImage::factory()->create(['product_id' => $product->id]);

        $this->assertInstanceOf(Product::class, $image->product);
    }
}

<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductImageUploadTest extends TestCase
{
    use RefreshDatabase;

    public function test_product_can_be_created_with_multiple_images()
    {
        // Simulasi login jika ada auth
        // $this->actingAs(User::factory()->create());

        Storage::fake('cloudinary');

        $response = $this->post('/products', [
            'name' => 'Produk Test',
            'images' => [
                UploadedFile::fake()->image('gambar1.jpg'),
                UploadedFile::fake()->image('gambar2.jpg'),
            ]
        ]);

        $response->assertRedirect();
        $this->assertDatabaseHas('products', ['name' => 'Produk Test']);
        $this->assertDatabaseCount('product_images', 2);
    }
}

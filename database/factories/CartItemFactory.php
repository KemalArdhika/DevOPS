<?php
namespace Database\Factories;

use App\Models\CartItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CartItemFactory extends Factory
{
    protected $model = CartItem::class;

    public function definition()
    {
        $user = User::inRandomOrder()->first() ?? User::factory()->create();
        $product = Product::inRandomOrder()->first() ?? Product::factory()->create();

        return [
            'user_id' => $user->id,
            'product_id' => $product->id,
            'quantity' => $this->faker->numberBetween(1,5),
        ];
    }
}
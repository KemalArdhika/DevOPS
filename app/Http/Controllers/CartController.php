<?php
namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $items = CartItem::with('product')->get();
        return view('cart.index', compact('items'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1'
        ]);

        CartItem::create([
            'user_id' => Auth::id() ?? 1,
            'product_id' => $data['product_id'],
            'quantity' => $data['quantity'],
        ]);

        return redirect()->route('cart.index')
            ->with('success', 'Item added to cart.');
    }

    public function update(Request $request, CartItem $cart)
    {
        $cart->update($request->validate([
            'quantity' => 'required|integer|min:1'
        ]));
        return redirect()->route('cart.index')
            ->with('success', 'Cart updated.');
    }

    public function destroy(CartItem $cart)
    {
        $cart->delete();
        return redirect()->route('cart.index')
            ->with('success', 'Item removed.');
    }
}
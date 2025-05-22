<?php
namespace App\Http\Controllers;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller {
    public function index() {
        // Ambil seluruh item keranjang beserta data produk
        $items = CartItem::with('product')->get();
        return view('cart.index', compact('items'));
    }
    public function store(Request $request) {
        // Tambah produk ke keranjang atau perbarui quantity jika sudah ada
        $item = CartItem::updateOrCreate(
            ['product_id' => $request->product_id],
            ['quantity'   => $request->quantity ?? 1]
        );
        return redirect()->route('cart.index')->with('success','Item ditambahkan ke keranjang');
    }
    public function update(Request $request, CartItem $cartItem) {
        $cartItem->update(['quantity' => $request->quantity]);
        return redirect()->route('cart.index')->with('success','Jumlah item diperbarui');
    }
    public function destroy(CartItem $cartItem) {
        $cartItem->delete();
        return redirect()->route('cart.index')->with('success','Item dihapus dari keranjang');
    }
}

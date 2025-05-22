<?php
namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller {
    public function index() {
        $products = Product::all();
        return view('products.index', compact('products'));
    }
    public function create() {
        return view('products.create');
    }
    public function store(Request $request) {
        // Validasi input
        $data = $request->validate([
            'name'=>'required|string|max:255',
            'description'=>'nullable|string',
            'price'=>'required|numeric',
            'images.*'=>'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        Product::create($data);
        // Simpan gambar produk jika ada
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('products', 'public');
                $product = Product::create($data);
                $product->images()->create([
                    'cloudinary_public_id' => $path,
                    'image_url' => $path,
                ]);
            }
        }
        return redirect()->route('products.index')->with('success','Produk berhasil ditambah');
    }
    public function show(Product $product) {
        return view('products.show', compact('product'));
    }
    public function edit(Product $product) {
        return view('products.edit', compact('product'));
    }
    public function update(Request $request, Product $product) {
        $data = $request->validate([
            'name'=>'required|string|max:255',
            'description'=>'nullable|string',
            'price'=>'required|numeric',
        ]);
        $product->update($data);
        return redirect()->route('products.index')->with('success','Produk berhasil diperbarui');
    }
    public function destroy(Product $product) {
        $product->delete();
        return redirect()->route('products.index')->with('success','Produk berhasil dihapus');
    }
}

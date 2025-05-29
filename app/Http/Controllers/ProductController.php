<?php
namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('images')->get();
        return view('products.index', compact('products'));
    }

    public function show(Product $product)
    {
        $product->load('images');
        return view('products.show', compact('product'));
    }
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $product = Product::create([
        'name' => $request->name,
        'description' => $request->description ?? '',
        'price' => $request->price ?? 0,
    ]);

    if ($request->hasFile('images')) {
        foreach ($request->file('images') as $image) {
            $path = Storage::disk('cloudinary')->put('', $image);
            ProductImage::create([
                'product_id' => $product->id,
                'image_url' => $path,
            ]);
        }
    }

    return redirect()->route('products.index');
}
}
@extends('layouts.app')

@section('content')
    <h1>Daftar Produk</h1>

    @foreach($products as $product)
        <div style="margin-bottom: 2rem;">
            <h2>{{ $product->name }}</h2>
            <p>{{ $product->description }}</p>
            <p>Harga: Rp{{ number_format($product->price, 0, ',', '.') }}</p>

            @if($product->images->count())
                <div style="display: flex; gap: 10px;">
                    @foreach($product->images as $image)
                        <img src="{{ $image->image_url }}" alt="Product Image" style="width: 100px; height: auto;">
                    @endforeach
                </div>
            @endif
        </div>
    @endforeach
@endsection

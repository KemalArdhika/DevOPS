@extends('layouts.app')

@section('content')
    <h1>{{ $product->name }}</h1>
    <p>{{ $product->description }}</p>
    <p>Harga: Rp{{ number_format($product->price, 0, ',', '.') }}</p>

    @if($product->images->count())
        <div style="display: flex; gap: 10px;">
            @foreach($product->images as $image)
                <img src="{{ $image->image_url }}" alt="Product Image" style="width: 200px;">
            @endforeach
        </div>
    @endif
@endsection

@extends('layouts.app')

@section('title', 'Your Shopping Cart')

@section('content')
    <h1>Your Shopping Cart</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($items->isEmpty())
        <p>Your cart is empty.</p>
    @else
        <ul>
            @foreach($items as $item)
                <li>{{ $item->name }} - {{ $item->price }}</li>
            @endforeach
        </ul>
    @endif
@endsection
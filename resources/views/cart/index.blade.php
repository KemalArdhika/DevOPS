@extends('layouts.app')
@section('title','Your Cart')
@section('content')
  <h1>Your Cart</h1>
  @if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif
  @if($items->isEmpty())
    <p>Your cart is empty.</p>
  @else
    <table class="table">
      <thead><tr><th>Product</th><th>Price</th><th>Qty</th><th>Subtotal</th><th></th></tr></thead>
      <tbody>
        @foreach($items as $item)
          <tr>
            <td>{{ $item->product->name }}</td>
            <td>Rp {{ number_format($item->product->price,0,',','.') }}</td>
            <td>
              <form action="{{ route('cart.update', $item) }}" method="POST" class="d-inline">
                @method('PUT')@csrf
                <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" class="form-control d-inline-block" style="width:70px;">
                <button class="btn btn-sm btn-outline-secondary">Update</button>
              </form>
            </td>
            <td>Rp {{ number_format($item->product->price * $item->quantity,0,',','.') }}</td>
            <td>
              <form action="{{ route('cart.destroy', $item) }}" method="POST">
                @method('DELETE')@csrf
                <button class="btn btn-sm btn-danger">Remove</button>
              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
    <div class="text-end">
      <strong>Total: Rp {{ number_format($items->sum(fn($i)=>$i->product->price*$i->quantity),0,',','.') }}</strong>
    </div>
  @endif
@endsection
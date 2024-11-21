@extends('admin.layout.layout')

@section('content')
<div class="container my-4">
    <h1>Shopping Cart</h1>

    @if ($basketItems->isEmpty())
        <p>Your cart is empty.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($basketItems as $item)
                    <tr>
                        <td><img src="{{ asset('storage/' . $item->product->image) }}" alt="{{ $item->product->title }}" class="img-fluid" width="100"></td>
                        <td>{{ $item->product->title }}</td>
                        <td>{{ $item->stock_count }}</td>
                        <td>${{ $item->product->price }}</td>
                        <td>${{ $item->product->price * $item->stock_count }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="text-right">
            <h3>Total Price: ${{ $totalPrice }}</h3>
        </div>
    @endif
</div>
@endsection

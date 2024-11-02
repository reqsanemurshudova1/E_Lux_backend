@extends('admin.layout.layout')

@section('content')
<div class="container mt-4">
    <h1>Add New Shipping Method</h1>

    <form action="{{ route('admin.shipping.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" name="price" step="0.01" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="delivery_time">Delivery Time</label>
            <input type="text" name="delivery_time" class="form-control">
        </div>
        <div class="form-group">
            <label for="carrier">Carrier</label>
            <input type="text" name="carrier" class="form-control">
        </div>
        <div class="form-group">
            <label for="min_amount">Minimum Amount</label>
            <input type="number" name="min_amount" step="0.01" class="form-control">
        </div>
        <div class="form-group">
            <label for="max_amount">Maximum Amount</label>
            <input type="number" name="max_amount" step="0.01" class="form-control">
        </div>
        <div class="form-group">
            <label for="additional_charges">Additional Charges</label>
            <input type="number" name="additional_charges" step="0.01" class="form-control">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control"></textarea>
        </div>

        <button type="submit" class="btn btn-success">Save</button>
    </form>
</div>
@endsection

@extends('admin.layout.layout')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Add New Shipping Method</h1>

    <form action="{{ route('admin.shipping.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" name="price" id="price" step="0.01" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="image">Upload Image</label>
            <input type="file" name="image" id="image" class="form-control">
        </div>
        <div class="form-group">
            <label for="delivery_time">Delivery Time</label>
            <input type="text" name="delivery_time" id="delivery_time" class="form-control">
        </div>
        <div class="form-group">
            <label for="carrier">Carrier</label>
            <input type="text" name="carrier" id="carrier" class="form-control">
        </div>
        <div class="form-group">
            <label for="min_amount">Minimum Amount</label>
            <input type="number" name="min_amount" id="min_amount" step="0.01" class="form-control">
        </div>
        <div class="form-group">
            <label for="max_amount">Maximum Amount</label>
            <input type="number" name="max_amount" id="max_amount" step="0.01" class="form-control">
        </div>
        <div class="form-group">
            <label for="additional_charges">Additional Charges</label>
            <input type="number" name="additional_charges" id="additional_charges" step="0.01" class="form-control">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" rows="3"></textarea>
        </div>

        <button type="submit" class="btn btn-success mt-3">Save</button>
    </form>
</div>
@endsection

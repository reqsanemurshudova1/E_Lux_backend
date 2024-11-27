@extends('admin.layout.layout')

@section('content')
    <div class="container mt-5">
        <h1 class="display-5 pb-3 pt-3">Add New Product Description</h1>

        @if(Session::has('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>{{ session('error') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Add Product Description</h5>
            </div>

            <div class="card-body">
                <form action="{{ route('admin.products_description.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="product_id">Select Product</label>
                        <select name="product_id" id="product_id" class="form-control" required>
                            <option value="" disabled selected>Choose a product</option>
                            @foreach($products as $product)
                                <option value="{{ $product->id }}">{{ $product->product_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="origin">Origin</label>
                        <input type="text" name="origin" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="material">Material</label>
                        <input type="text" name="material" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="care_instructions">Care Instructions</label>
                        <textarea name="care_instructions" class="form-control" rows="4" required></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Add Product Description</button>
                    <a href="{{ route('admin.products_description.index') }}" class="btn btn-secondary">Back to List</a>
                </form>
            </div>
        </div>
    </div>
@endsection

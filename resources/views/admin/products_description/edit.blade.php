@extends('admin.layout.layout')

@section('content')
    <div class="container mt-5">
        <h1 class="display-5 p-3">Edit Product Description</h1>

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
                <h5 class="mb-0">Update Product Description</h5>
            </div>

            <div class="card-body">
                <form action="{{ route('admin.products_description.update', $description->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="origin">Origin:</label>
                        <input type="text" name="origin" id="origin" class="form-control" value="{{ old('origin', $description->origin) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="material">Material:</label>
                        <input type="text" name="material" id="material" class="form-control" value="{{ old('material', $description->material) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="care_instructions">Care Instructions:</label>
                        <input type="text" name="care_instructions" id="care_instructions" class="form-control" value="{{ old('care_instructions', $description->care_instructions) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="product_id">Product:</label>
                        <select name="product_id" id="product_id" class="form-control" required>
                            @foreach($products as $product)
                                <option value="{{ $product->id }}"
                                    {{ $description->product_id == $product->id ? 'selected' : '' }}>
                                    {{ $product->product_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('admin.products_description.index') }}" class="btn btn-secondary">Back to Product Descriptions List</a>
                </form>
            </div>
        </div>
    </div>
@endsection

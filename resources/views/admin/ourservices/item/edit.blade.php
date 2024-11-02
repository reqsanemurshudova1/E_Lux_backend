@extends('admin.layout.layout')

@section('content')
    <div class="container mt-5">
        <h1 class="display-4">Edit Service Item</h1>

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
                <h5 class="mb-0">Update Service Item</h5>
            </div>

            <div class="card-body">
                <!-- Form start -->
                <form action="{{ route('admin.ourservices.items.update', $serviceItem->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="header">Header:</label>
                        <input type="text" name="header" id="header" class="form-control" value="{{ old('header', $serviceItem->header) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description:</label>
                        <textarea name="description" id="description" class="form-control" required>{{ old('description', $serviceItem->description) }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="icon">Icon:</label>
                        <input type="text" name="icon" id="icon" class="form-control" value="{{ old('icon', $serviceItem->icon) }}">
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('admin.ourservices.index') }}" class="btn btn-secondary">Back to Service Items List</a>
                </form>
                <!-- Form end -->
            </div>
        </div>
    </div>
@endsection

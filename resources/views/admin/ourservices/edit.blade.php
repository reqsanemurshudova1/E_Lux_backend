@extends('admin.layout.layout')

@section('content')
    <div class="container mt-5">
        <h1 class="display-4">Edit Service</h1>

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
                <h5 class="mb-0">Update Service</h5>
            </div>

            <div class="card-body">
                <!-- Form start -->
                <form action="{{ route('admin.ourservices.update', $service) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="header">Header:</label>
                        <input type="text" name="header" id="header" class="form-control" value="{{ old('header', $service->header) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description:</label>
                        <textarea name="description" id="description" class="form-control" required>{{ old('description', $service->description) }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('admin.ourservices.index') }}" class="btn btn-secondary">Back to Services List</a>
                </form>
                <!-- Form end -->
            </div>
        </div>
    </div>
@endsection

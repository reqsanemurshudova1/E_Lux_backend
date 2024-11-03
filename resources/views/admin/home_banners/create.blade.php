@extends('admin.layout.layout')

@section('content')
    <div class="container mt-5">
        <h1 class="display-5 pb-3 pt-3">Add New Home Banner</h1>

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
                <h5 class="mb-0">Add Banner Info</h5>
            </div>

            <div class="card-body">
                <form action="{{ route('admin.home_banners.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="img">Image</label>
                        <input type="file" name="img" accept="image/*" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="header">Header</label>
                        <input type="text" name="header" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" class="form-control" rows="3" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="style_count">Style Count</label>
                        <input type="text" name="style_count" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="brand_count">Brand Count</label>
                        <input type="text" name="brand_count" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="footer_info">Footer Info</label>
                        <input type="text" name="footer_info" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Banner</button>
                    <a href="{{ route('admin.home_banners.index') }}" class="btn btn-secondary">Back to Banner List</a>
                </form>
            </div>
        </div>
    </div>
@endsection

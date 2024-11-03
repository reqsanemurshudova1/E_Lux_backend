@extends('admin.layout.layout')

@section('content')
    <div class="container mt-5">
        <h2 class="display-5 p-3">Edit Home Banner Info</h2>

        @if(Session::has('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>{{ session('error') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Update Home Banner</h5>
            </div>

            <div class="card-body">
                <form action="{{ route('admin.home_banners.update', $banner) }}" method="POST"
                      enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Existing Image Preview -->
                    @if($banner->img)
                        <div class="mb-3">
                            <img src="{{ asset('storage/' . $banner->img) }}" alt="Current Image"
                                 style="max-width: 200px;">
                        </div>
                    @endif

                    <!-- Image Input -->
                    <div class="form-group">
                        <label for="img">Banner Image:</label>
                        <input type="file" accept="image/*" name="img" id="img" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="header">Header:</label>
                        <input type="text" name="header" id="header" class="form-control"
                               value="{{ old('header', $banner->header) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description:</label>
                        <input type="text" name="description" id="description" class="form-control"
                               value="{{ old('description', $banner->description) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="style_count">Style Count:</label>
                        <input type="text" name="style_count" id="style_count" class="form-control"
                               value="{{ old('style_count', $banner->style_count) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="brand_count">Brand Count:</label>
                        <input type="text" name="brand_count" id="brand_count" class="form-control"
                               value="{{ old('brand_count', $banner->brand_count) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="footer_info">Footer Info:</label>
                        <input type="text" name="footer_info" id="footer_info" class="form-control"
                               value="{{ old('footer_info', $banner->footer_info) }}" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('admin.home_banners.index') }}" class="btn btn-secondary">Back to Home List</a>
                </form>
            </div>
        </div>
    </div>
@endsection

@extends('admin.layout.layout')

@section('content')
    <div class="container mt-5">
        <h1 class="display-5 pb-3 pt-3">Add New Product Review</h1>

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
                <h5 class="mb-0">Add Review Info</h5>
            </div>

            <div class="card-body">
                <form action="{{ route('admin.product_reviews.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="profile_photo">Profile Photo</label>
                        <input type="file" name="profile_photo" accept="image/*" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="profile_name">Profile Name</label>
                        <input type="text" name="profile_name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="comment">Comment</label>
                        <textarea name="comment" class="form-control" rows="3" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="like">Likes</label>
                        <input type="number" name="like" class="form-control" min="0" value="0">
                    </div>
                    <div class="form-group">
                        <label for="dislike">Dislikes</label>
                        <input type="number" name="dislike" class="form-control" min="0" value="0">
                    </div>
                    <div class="form-group">
                        <label for="product_id">Product</label>
                        <select name="product_id" class="form-control" required>
                            <option value="">Select Product</option>
                            @foreach($products as $product)
                                <option value="{{ $product->id }}">{{ $product->product_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Review</button>
                    <a href="{{ route('admin.product_reviews.index') }}" class="btn btn-secondary">Back to Review List</a>
                </form>
            </div>
        </div>
    </div>
@endsection

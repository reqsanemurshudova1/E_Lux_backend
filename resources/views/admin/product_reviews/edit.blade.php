@extends('admin.layout.layout')

@section('content')
    <div class="container mt-5">
        <h1 class="display-5 pb-3 pt-3">Update Product Review</h1>

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
                <h5 class="mb-0">Update Review Info</h5>
            </div>

            <div class="card-body">
                <form action="{{ route('admin.product_reviews.update', $review->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="profile_photo">Profile Photo</label>
                        <input type="file" name="profile_photo" accept="image/*" class="form-control">
                        @if($review->profile_photo)
                            <div class="mt-2">
                                <img style="max-width: 150px;" src="{{ asset('storage/' . $review->profile_photo) }}" alt="Profile Photo">
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="profile_name">Profile Name</label>
                        <input type="text" name="profile_name" class="form-control" value="{{ old('profile_name', $review->profile_name) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="comment">Comment</label>
                        <textarea name="comment" class="form-control" rows="3" required>{{ old('comment', $review->comment) }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="like">Likes</label>
                        <input type="number" name="like" class="form-control" min="0" value="{{ old('like', $review->like) }}">
                    </div>

                    <div class="form-group">
                        <label for="dislike">Dislikes</label>
                        <input type="number" name="dislike" class="form-control" min="0" value="{{ old('dislike', $review->dislike) }}">
                    </div>

                    <div class="form-group">
                        <label for="product_id">Product</label>
                        <select name="product_id" class="form-control" required>
                            <option value="">Select Product</option>
                            @foreach($products as $product)
                                <option value="{{ $product->id }}" {{ $product->id == old('product_id', $review->product_id) ? 'selected' : '' }}>
                                    {{ $product->product_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Update Review</button>
                    <a href="{{ route('admin.product_reviews.index') }}" class="btn btn-secondary">Back to Review List</a>
                </form>
            </div>
        </div>
    </div>
@endsection

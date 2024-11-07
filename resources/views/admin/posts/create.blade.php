@extends('admin.layout.layout')

@section('content')
<div class="container mt-5">
    <h1 class="display-4">Create Post</h1>

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
            <h5 class="mb-0">Create New Post</h5>
        </div>

        <div class="card-body">
            <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="image">Post Image:</label>
                    <input type="file" name="image" id="image" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" name="title" id="title" class="form-control" required>
                </div>
                <div class="form-group">
    <label for="seller">Seller:</label>
    <input type="text" name="seller" id="seller" class="form-control" required>
</div>

<div class="form-group">
    <label for="author_image">Author Image:</label>
    <input type="file" name="author_image" id="author_image" class="form-control">
</div>
<div class="form-group">
    <label for="author_bio">Author Bio:</label>
    <textarea name="author_bio" id="author_bio" class="form-control" required></textarea>
</div>

                <div class="form-group">
                    <label for="content">Content:</label>
                    <textarea name="content" id="content" class="form-control" required></textarea>
                </div>
                <div class="form-group">
                    <label for="author">Author:</label>
                    <input type="text" name="author" id="author" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="category">Category:</label>
                    <input type="text" name="category" id="category" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
                <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary">Back to Post List</a>
            </form>
        </div>
    </div>
</div>
@endsection

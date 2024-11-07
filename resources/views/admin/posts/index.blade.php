@extends('admin.layout.layout')

@section('content')
<div class="container mt-5">
    <h1 class="display-4 text-center">Post List</h1>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" id="successMessage">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert" id="errorMessage">
            {{ session('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="text-right mb-3">
        <a href="{{ route('admin.posts.create') }}" class="btn btn-primary">Add New Post</a>
    </div>

    <div class="row">
        @foreach($posts as $post)
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm h-100">
                    @if($post->image)
                        <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="card-img-top" style="height: 200px; object-fit: cover;">
                    @else
                        <img src="https://via.placeholder.com/200x200?text=No+Image" alt="No Image" class="card-img-top" style="height: 200px; object-fit: cover;">
                    @endif

                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="card-text">
                          
                            <strong>Category:</strong> {{ $post->category }}<br>
                            <strong>Seller:</strong> {{ $post->seller }}<br>
                            <strong>Bio:</strong> {{ $post->author_bio }}<br>
                            <strong>Author:</strong> {{ $post->author }}<br>
                        </p>
                        @if($post->author_image)
                            <div class="author-image text-center mb-2">
                                <img src="{{ asset('storage/' . $post->author_image) }}" alt="Author Image" class="rounded-circle" style="width: 50px; height: 50px;">
                            </div>
                        @endif
                        <div class="mt-auto d-flex justify-content-between">
                            <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this post?');">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        setTimeout(function() {
            let successMessage = document.getElementById('successMessage');
            let errorMessage = document.getElementById('errorMessage');
            if (successMessage) successMessage.style.display = 'none';
            if (errorMessage) errorMessage.style.display = 'none';
        }, 3000); 
    });
</script>
@endsection

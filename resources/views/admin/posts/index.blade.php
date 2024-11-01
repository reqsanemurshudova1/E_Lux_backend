@extends('admin.layout.layout')

@section('content')
<div class="container mt-5">
    <h1 class="display-4">Post List</h1>

    <!-- Success Message -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" id="successMessage">
            {{ session('success') }}
        </div>
    @endif

    <!-- Error Message -->
    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert" id="errorMessage">
            {{ session('error') }}
        </div>
    @endif

    <a href="{{ route('admin.posts.create') }}" class="btn btn-primary mb-3">Add New Post</a>

    <div class="row">
        @foreach($posts as $post)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <!-- Post Image -->
                    @if($post->image)
                        <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="card-img-top" style="height: 200px; object-fit: cover;">
                    @else
                        <img src="https://via.placeholder.com/200x200?text=No+Image" alt="No Image" class="card-img-top" style="height: 200px; object-fit: cover;">
                    @endif

                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="card-text">
                            <strong>Author:</strong> {{ $post->author }}<br>
                            <strong>Category:</strong> {{ $post->category }}
                        </p>
                    </div>

                    <div class="card-footer d-flex justify-content-between">
                        <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this post?');">Delete</button>
                        </form>
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

            if (successMessage) {
                successMessage.style.display = 'none';
            }

            if (errorMessage) {
                errorMessage.style.display = 'none';
            }
        }, 200); 
    });
</script>

@endsection

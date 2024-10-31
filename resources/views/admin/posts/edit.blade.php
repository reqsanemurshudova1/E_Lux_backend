@extends('admin.layout.layout')

@section('content')
    <h1>Edit Post</h1>

    <form action="{{ route('admin.posts.update', $post) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label>Title:</label>
            <input type="text" name="title" value="{{ $post->title }}" required>
        </div>
        <div>
            <label>Content:</label>
            <textarea name="content" required>{{ $post->content }}</textarea>
        </div>
        <div>
            <label>Author:</label>
            <input type="text" name="author" value="{{ $post->author }}" required>
        </div>
        <div>
            <label>Category:</label>
            <input type="text" name="category" value="{{ $post->category }}" required>
        </div>
        <button type="submit">Update</button>
    </form>
@endsection

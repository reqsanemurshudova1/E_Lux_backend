@extends('admin.layout.layout')

@section('content')
    <h1>Create Post</h1>

    <form action="{{ route('admin.posts.store') }}" method="POST">
        @csrf
        <div>
            <label>Title:</label>
            <input type="text" name="title" required>
        </div>
        <div>
            <label>Content:</label>
            <textarea name="content" required></textarea>
        </div>
        <div>
            <label>Author:</label>
            <input type="text" name="author" required>
        </div>
        <div>
            <label>Category:</label>
            <input type="text" name="category" required>
        </div>
        <button type="submit">Create</button>
    </form>
@endsection

@extends('admin.layout.layout')

@section('content')
<div id="content">
    <h1>Edit Category</h1>

    <form method="POST" action="{{ route('admin.category.update', $category->id) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Category Name</label>
            <input type="text" name="category_name" id="name" class="form-control" value="{{ $category->name }}" required>
        </div>
        <button type="submit" class="btn btn-success">Update Category</button>
    </form>
</div>
@endsection

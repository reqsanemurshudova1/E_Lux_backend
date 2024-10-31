@extends('admin.layout.layout')

@section('content')
<div id="content">
    <h1>Add Category</h1>

    <form method="POST" action="{{ route('admin.categories.store') }}">
        @csrf
        <div class="form-group">
            <label for="name">Category Name</label>
            <input type="text" name="category_name" id="name" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Add Category</button>
    </form>
</div>
@endsection

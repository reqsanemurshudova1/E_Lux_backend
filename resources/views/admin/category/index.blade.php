@extends('admin.layout.layout')

@section('content')
<div id="content">
    <h1>Categories</h1>

    @if(Session::has('flash_message_success'))
        <div class="alert alert-success">{{ session('flash_message_success') }}</div>
    @endif

    <a href="{{ route('admin.category.create') }}" class="btn btn-primary">Add Category</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->category_name }}</td>
                    <td>
                        <a href="{{ route('admin.category.edit', $category->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('admin.category.destroy', $category->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@extends('admin.layout.layout')

@section('content')
    <div class="container mt-5">
        <div class="pt-5 pb-3 d-flex justify-content-between align-items-center">
            <h1 class="display-5">Product Descriptions</h1>
            <a href="{{ route('admin.products_description.create') }}" class="btn btn-primary">Add New Description</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert" id="successMessage">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert" id="errorMessage">
                {{ session('error') }}
            </div>
        @endif

        <div class="card">
            <div class="card-body">
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Product</th>
                        <th>Origin</th>
                        <th>Material</th>
                        <th>Care Instructions</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($descriptions as $description)
                        <tr>
                            <td>{{ $description->id }}</td>
                            <td>{{ $description->product->product_name }}</td>
                            <td>{{ $description->origin }}</td>
                            <td>{{ $description->material }}</td>
                            <td>{{ Str::limit($description->care_instructions, 50) }}</td>
                            <td>
                                <a href="{{ route('admin.products_description.edit', $description->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('admin.products_description.destroy', $description->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
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
            }, 2000);
        });
    </script>
@endsection

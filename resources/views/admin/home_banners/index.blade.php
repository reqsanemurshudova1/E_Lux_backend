@extends('admin.layout.layout')

@section('content')
    <div class="container mt-5">

        <div class="pt-5 pb-3 d-flex justify-content-between align-items-center">
            <h1 class="display-5">Home Banners Info</h1>
            <a href="{{ route('admin.home_banners.create') }}" class="btn btn-primary">Add home banner info</a>

        </div>

        @if(session('info'))
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                {{ session('info') }}
            </div>
        @endif

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert" id="successMessage">
                {{ session('success') }}
            </div>
        @endif

        <div class="card">
            <div class="card-body">
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Img</th>
                        <th>Header</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($banners as $banner)
                        <tr>
                            <td>{{ $banner->id }}</td>
                            <td><img style="max-width: 50px;" src="{{ asset('storage/' . $banner->img) }}"/></td>
                            <td>{{ Str::limit($banner->header, 50) }}</td>
                            <td>{{ Str::limit($banner->description, 50) }}</td>
                            <td>
                                <a href="{{ route('admin.home_banners.edit', $banner->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('admin.home_banners.destroy', $banner->id) }}" method="POST" style="display:inline;">
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

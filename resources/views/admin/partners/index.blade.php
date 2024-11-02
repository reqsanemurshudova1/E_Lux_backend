@extends('admin.layout.layout')

@section('content')
    <div class="container mt-5">

        <div class="pt-5 pb-3 d-flex justify-content-between align-items-center">
            <h1 class="display-5">Partners</h1>
                <a href="{{ route('admin.partners.create') }}" class="btn btn-primary">Add new partner</a>

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
                        <th>Title</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($partners as $service)
                        <tr>
                            <td>{{ $service->id }}</td>
                            <td><img style="max-width: 50px;" src="{{ asset('storage/' . $service->img) }}"/></td>
                            <td>{{ Str::limit($service->title, 50) }}</td>
                            <td>
                                <a href="{{ route('admin.partners.edit', $service->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('admin.partners.destroy', $service->id) }}" method="POST" style="display:inline;">
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

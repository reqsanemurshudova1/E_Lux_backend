@extends('admin.layout.layout')

@section('content')
    <div class="container mt-5">

        <div class="pt-3 pb-3 d-flex justify-content-between align-items-center">
            <h1 class="display-5">Our Service Info</h1>
            @if($services->isEmpty())
                <a href="{{ route('admin.ourservices.create') }}" class="btn btn-primary">Add Our Service info</a>
            @endif
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
                        <th>Header</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($services as $service)
                        <tr>
                            <td>{{ $service->id }}</td>
                            <td>{{ $service->header }}</td>
                            <td>{{ Str::limit($service->description, 50) }}</td>
                            <td>
                                <a href="{{ route('admin.ourservices.edit', $service->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('admin.ourservices.destroy', $service->id) }}" method="POST" style="display:inline;">
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

        <!-- Our Service Items Table -->
        <div class="card mt-4">
            <div class="card-header">
                <div class=" d-flex justify-content-between align-items-center">
                    <h5>Our Service Items</h5>
                    <a href="{{ route('admin.ourservices.items.create') }}" class="btn btn-success">Add Our Service Item</a>
                </div>

            </div>
            <div class="card-body">
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Header</th>
                        <th>Description</th>
                        <th>Icon</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($serviceItems as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->header }}</td>
                            <td>{{ Str::limit($item->description, 50) }}</td>
                            <td>{{ $item->icon }}</td>
                            <td>
                                <a href="{{ route('admin.ourservices.items.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('admin.ourservices.items.destroy', $item->id) }}" method="POST" style="display:inline;">
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

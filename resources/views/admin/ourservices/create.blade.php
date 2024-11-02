@extends('admin.layout.layout')

@section('content')
    <div class="container mt-5">
        <h1 class="display-5 pb-3 pt-3">Add our service info</h1>

        @if(Session::has('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>{{ session('error') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Add Our Service info</h5>
            </div>

            <div class="card-body">
                <form action="{{ route('admin.ourservices.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="header">Header:</label>
                        <input type="text" name="header" id="header" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description:</label>
                        <textarea name="description" id="description" class="form-control" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                    <a href="{{ route('admin.ourservices.index') }}" class="btn btn-secondary">Back to Service List</a>
                </form>
            </div>
        </div>
    </div>
@endsection

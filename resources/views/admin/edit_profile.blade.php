<!-- resources/views/admin/edit_profile.blade.php -->

@extends('admin.layout.layout')

@section('content')

    <section class="content">
        <div class="container">
            <div class="row justify-content-center"  style="padding-top: 70px;">
                <div class="col-md-8 col-lg-6">
                    <!-- Profile Update Card -->
                    <div class="card shadow-lg" style="border-radius: 15px;">
                        <div class="card-header bg-primary text-white text-center" style="border-top-left-radius: 15px; border-top-right-radius: 15px;">
                            <h3 class="card-title">Update Profile</h3>
                        </div>
                        <div class="card-body p-4">
                            <!-- Profile Image Display -->
                            <div class="text-center mb-4">
                                <img src="{{ Storage::url(Auth::guard('admin')->user()->image ?? 'dist/img/user2-160x160.jpg') }}" alt="Profile Image" class="img-thumbnail rounded-circle" width="120" height="120">
                            </div>

                            <!-- Profile Update Form -->
                            <form action="{{ route('admin.update_profile') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <!-- Name Field -->
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" id="name" value="{{ Auth::guard('admin')->user()->name }}" class="form-control" placeholder="Enter your name">
                                </div>

                                <!-- Email Field -->
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" id="email" value="{{ Auth::guard('admin')->user()->email }}" class="form-control" placeholder="Enter your email">
                                </div>

                                <!-- Profile Image Upload Field -->
                                <div class="form-group">
                                    <label for="image">Profile Image</label>
                                    <input type="file" name="image" id="image" class="form-control-file">
                                </div>

                                <!-- Update Button -->
                                <div class="text-center mt-4">
                                    <button type="submit" class="btn btn-primary btn-block" style="border-radius: 25px;">Update Profile</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /Profile Update Card -->
                </div>
            </div>
        </div>
    </section>

@endsection

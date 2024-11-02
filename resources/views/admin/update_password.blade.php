@extends('admin.layout.layout')
@section('content')
<!-- Content Wrapper. Contains page content -->

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
         
            
        </div>
    </div>
</div>

<section class="content">
    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-md-8 col-lg-6">
                <!-- Password Update Card -->
                <div class="card shadow-lg">
                    <div class="card-header bg-primary text-white text-center">
                        <h3 class="card-title">Update Admin Password</h3>
                    </div>
                    <form role="form" action="{{ route('admin.update_password.post') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <!-- Email Field (Read-only) -->
                            <div class="form-group">
                                <label for="adminEmail">Email address</label>
                                <input type="email" class="form-control" value="{{ Auth::guard('admin')->user()->email }}" readonly>
                            </div>
                            <!-- Current Password Field -->
                            <div class="form-group">
                                <label for="currentPassword">Current Password</label>
                                <input type="password" class="form-control" name="currentPassword" placeholder="Enter current password" required>
                            </div>
                            <!-- New Password Field -->
                            <div class="form-group">
                                <label for="newPassword">New Password</label>
                                <input type="password" class="form-control" name="newPassword" placeholder="Enter new password" required>
                            </div>
                            <!-- Confirm Password Field -->
                            <div class="form-group">
                                <label for="confirmPassword">Confirm Password</label>
                                <input type="password" class="form-control" name="newPassword_confirmation" placeholder="Confirm new password" required>
                            </div>
                            <!-- Profile Image Field (Optional) -->
                            <div class="form-group">
                                <label for="image">Profile Image (optional)</label>
                                <input type="file" class="form-control-file" name="image" accept="image/*">
                            </div>
                        </div>
                        <!-- Submit Button -->
                        <div class="card-footer text-center">
                            <button type="submit" class="btn btn-primary btn-block" style="border-radius: 25px;">Submit</button>
                        </div>
                    </form>
                </div>
                <!-- /Password Update Card -->
            </div>
        </div>
    </div>
</section>

@endsection

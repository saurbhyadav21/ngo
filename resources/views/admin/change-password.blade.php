@extends('layouts.admin-layout')

@section('title', 'Change Password')

@section('content')
<div class="container mt-4">
    <h4>Change Password</h4>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @elseif(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form method="POST" action="{{ route('change.password.update') }}" id="changePasswordForm">
    @csrf

    <!-- Old password -->
    <div class="mb-3">
        <label>Old Password</label>
        <input type="password" class="form-control" name="old_password" required>
    </div>

    <!-- New password -->
    <div class="mb-3">
        <label>New Password</label>
        <input type="password" class="form-control" name="new_password" id="new_password" required>
    </div>

    <!-- Confirm new password -->
    <div class="mb-3">
        <label>Confirm New Password</label>
        <input type="password" class="form-control" name="new_password_confirmation" id="confirm_new_password" required>
        <span id="password-match-error" class="text-danger" style="display:none;">Passwords do not match.</span>
    </div>

    <button type="submit" class="btn btn-primary">Change Password</button>
</form>

</div>
<script>
    document.getElementById('changePasswordForm').addEventListener('submit', function (e) {
        const newPassword = document.getElementById('new_password').value;
        const confirmPassword = document.getElementById('confirm_new_password').value;
        const errorSpan = document.getElementById('password-match-error');

        if (newPassword !== confirmPassword) {
            e.preventDefault(); // stop form submit
            errorSpan.style.display = 'block'; // show error
        } else {
            errorSpan.style.display = 'none'; // hide error if previously shown
        }
    });
</script>

@endsection

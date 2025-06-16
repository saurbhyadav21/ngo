@extends('layouts.admin-layout')

@section('title', 'Edit Manager')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
    @media (max-width: 991px) {
        .sub {
            margin-top: 10px;
        }
        .custom-margin {
            margin-top: 0px !important;
        }
    }
    span {
        color: red;
    }
</style>

<div class="container mt-4 mb-5">
    <h4 class="mb-4 custom-margin">Edit Manager Form</h4>

    @if(session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('edit-manager-store', ['id' => $manager->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">Full Name <span>*</span></label>
                <input type="text" class="form-control" name="name" value="{{ $manager->name }}" required>
            </div>

            <div class="col-md-6">
                <label class="form-label">Email <span>*</span></label>
                <input type="email" class="form-control" name="email" value="{{ $manager->email }}" required>
            </div>
        </div>

      <div class="row mb-3">
    <div class="col-md-6 position-relative">
        <label class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password" value="{{ $manager->password }}">
        <span class="toggle-password" toggle="#password" style="position: absolute; top: 38px; right: 15px; cursor: pointer;">
            <i class="fa fa-eye" id="togglePasswordIcon"></i>
        </span>
    </div>

    <div class="col-md-6 position-relative">
        <label class="form-label">Confirm Password</label>
        <input type="password" class="form-control" id="confirm_password" name="password_confirmation" value="{{ $manager->password }}">
        <span class="toggle-password" toggle="#confirm_password" style="position: absolute; top: 38px; right: 15px; cursor: pointer;">
            <i class="fa fa-eye" id="toggleConfirmPasswordIcon"></i>
        </span>
    </div>
</div>


        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">Gender <span>*</span></label>
                <select class="form-control" name="gender" required>
                    <option value="" disabled>Select</option>
                    <option value="Male" {{ $manager->gender == 'Male' ? 'selected' : '' }}>Male</option>
                    <option value="Female" {{ $manager->gender == 'Female' ? 'selected' : '' }}>Female</option>
                    <option value="Other" {{ $manager->gender == 'Other' ? 'selected' : '' }}>Other</option>
                </select>
            </div>

            <div class="col-md-6">
                <label class="form-label">Phone <span>*</span></label>
                <input type="text" class="form-control" name="phone" value="{{ $manager->phone }}" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">Date of Birth <span>*</span></label>
                <input type="date" class="form-control" name="dob" value="{{ $manager->dob }}" required>
            </div>

            <div class="col-md-6">
                <label class="form-label">Pincode <span>*</span></label>
                <input type="text" class="form-control" name="pincode" value="{{ $manager->pincode }}" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">State <span>*</span></label>
                <input type="text" class="form-control" name="state" value="{{ $manager->state }}" required>
            </div>

            <div class="col-md-6">
                <label class="form-label">City <span>*</span></label>
                <input type="text" class="form-control" name="city" value="{{ $manager->city }}" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-12">
                <label class="form-label">Address <span>*</span></label>
                <textarea class="form-control" name="address" rows="3" required>{{ $manager->address }}</textarea>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">Image</label>
                <input type="file" class="form-control" name="image">
                @if($manager->image)
                    <small class="form-text text-muted mt-2">
                        Already uploaded:
                        <a href="{{ asset('storage/uploads/' . $manager->image) }}" target="_blank">View</a>
                    </small>
                    @else
                     <small class="form-text text-muted mt-2">
                        No Image:
                    </small>
                @endif
            </div>
        </div>

        <button type="submit" class="btn btn-primary mt-4 w-100">Update</button>
        <a href="{{ url()->previous() }}" class="btn btn-secondary w-100 mt-2">Back</a>
    </form>
</div>


<script>
document.addEventListener('DOMContentLoaded', function () {
  const password = document.querySelector('input[name="password"]');
  const confirm = document.querySelector('input[name="password_confirmation"]');

  confirm.addEventListener('input', function () {
    if (password.value !== confirm.value) {
      confirm.setCustomValidity("Passwords do not match");
    } else {
      confirm.setCustomValidity("");
    }
  });
});

  document.querySelectorAll('.toggle-password').forEach(function (eyeIcon) {
        eyeIcon.addEventListener('click', function () {
            const input = document.querySelector(this.getAttribute('toggle'));
            const icon = this.querySelector('i');

            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        });
    });
</script>
@endsection

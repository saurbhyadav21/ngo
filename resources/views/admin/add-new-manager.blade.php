@extends('layouts.admin-layout')

@section('title', 'Home - Admin Dashboard')

@section('content')
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
<style>
     @media (max-width: 991px) {
        .sub{
            margin-top: 10px;
        }
        
    .custom-margin {
      margin-top: 0px !important;
    }
  }

  span{
    color: red;
  }
    
    .product-group { margin-bottom: 10px; }
  </style>
<div class="container mt-4 mb-5 ">
  <h4 class="mb-4 custom-margin">Add New Doner</h4>
  @if(session('success'))
  <div class="alert alert-success mt-3">
    {{ session('success') }}
  </div>
@endif
    <form id="post-add-form" action="{{ route('store-manager') }}" method="POST" enctype="multipart/form-data">
     @csrf
    
    <div class="row mb-3"> 
       <div class="col-md-6">
        <label class="form-label">Name <span>*</span></label>
        <input type="text" class="form-control" name="name" required>
      </div>
      <div class="col-md-6">
        <label class="form-label">Email:<span>*</span></label>
        <input type="email" class="form-control" name="email">
      </div>
      
    </div>
    <div class="row mb-3">
  <div class="col-md-6">
    <label class="form-label">Password <span class="text-danger">*</span></label>
    <input type="password" class="form-control" name="password" placeholder="Enter Password" required>
  </div>

  <div class="col-md-6">
    <label class="form-label">Confirm Password <span class="text-danger">*</span></label>
    <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>
  </div>
</div>


    <div class="row mb-3">
        <div class="col-md-6">
                <label class="form-label">Gender <span>*</span></label>
                <select class="form-control" name="gender" required>
                    <option value="" disabled>Select</option>
                    <option value="Male" >Male</option>
                    <option value="Female" >Female</option>
                    <option value="Other" >Other</option>
                </select>
            </div>
      <div class="col-md-6"> 
        <label class="form-label">Mobile No. <span>*</span></label>
        <input type="text" class="form-control" name="phone" required>
      </div>
      
    </div>



    <div class="row mb-3">    
        <div class="col-md-6">
        <label class="form-label">Date Of Birth:</label>
        <input type="date" class="form-control" name="dob" required>
      </div>
       <div class="col-md-6">
        <label class="form-label">Pincode:</label>
        <input type="text" class="form-control" name="pincode" required>
      </div>
    </div>
    <div class="row mb-3">
  <div class="col-md-6">
    <label class="form-label">State <span class="text-danger">*</span></label>
    <input type="text" class="form-control" name="state" placeholder="Enter State" required>
  </div>

  <div class="col-md-6">
    <label class="form-label">City <span class="text-danger">*</span></label>
    <input type="text" class="form-control" name="city" placeholder="Enter City" required>
  </div>
</div>

<div class="row mb-3"> 
    <div class="col-12">
        <label class="form-label">Address <span>*</span></label>
           <textarea class="form-control" name="address" rows="3" required></textarea>
      </div>
    </div>

    <div class="row mb-3">
      <div class="col-md-6">
        <label class="form-label">Photo (Optional):</label>
        <input type="file" class="form-control" name="image">
      </div>
     
    </div>

    <button type="submit" class="btn btn-primary mt-4 w-100">Submit</button>
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
</script>


@endsection
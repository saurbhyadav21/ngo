@extends('layouts.admin-layout')

@section('title', 'Home - Admin Dashboard')

@section('content')
 <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> -->
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
    <form id="post-add-form" action="{{ route('store-doner') }}" method="POST" enctype="multipart/form-data">
     @csrf
    
    <div class="row mb-3"> 
       <div class="col-md-6">
        <label class="form-label">Name <span>*</span></label>
        <input type="text" class="form-control" name="name" required>
      </div>
      <div class="col-md-6">
        <label class="form-label">Mobile No. <span>*</span></label>
        <input type="text" class="form-control" name="phone" required>
      </div>
    </div>

    <div class="row mb-3">
      <div class="col-md-6">
        <label class="form-label">Email (Optional):</label>
        <input type="email" class="form-control" name="email">
      </div>
      <div class="col-md-6">
        <label class="form-label">Pancard No. (Optional):</label>
        <input type="text" class="form-control" name="pancard">
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
      <div class="col-md-6">
        <label class="form-label">Amount <span>*</span></label>
        <input type="text" class="form-control" name="amount"required>
      </div>
    </div>

    <button type="submit" class="btn btn-primary mt-4 w-100">Submit</button>
  </form>
</div>



@endsection
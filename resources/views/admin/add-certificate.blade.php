@extends('layouts.admin-layout')

@section('title', 'Home - Admin Dashboard')

@section('content')
<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
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
  <h4 class="mb-4 custom-margin">Add Certificate</h4>
  @if(session('success'))
  <div class="alert alert-success mt-3">
    {{ session('success') }}
  </div>
@endif
    <form id="post-add-form" action="{{ route('create-new-certificate') }}" method="POST" enctype="multipart/form-data">
     @csrf

    <div class="row mb-3">
        <div class="col-md-6">
        <label class="form-label">Title:<span>*</span></label>
        <input type="text" class="form-control" name="title" required>
      </div>
      <div class="col-md-6">
        <label class="form-label">Image:<span>*</span></label>
        <input type="file" class="form-control" name="certificate_image" required>
      </div>
      
    </div>

    <div class="row mb-3">
      <div class="col-md-6">
       <label for="Position">Position:<span>*</span></label>
        <input type="text" class="form-control" name="Position" required>

      </div>
      <div class="col-md-6">
       <label for="Status">Status:<span>*</span></label>
            <select class="form-control" name="Status" required>
                    <option value="" disabled>Select</option>
                    <option value="Show" >Show</option>
                    <option value="Hide" >Hide</option>
                </select>
      </div>
    </div>
    
    <button type="submit" class="btn btn-primary mt-4 w-100">Add Certificate</button>
  </form>
  <a href="{{ url()->previous() }}" class="btn btn-secondary w-100 mt-2">Back</a>

</div>

<!-- <script>
    CKEDITOR.replace('editor1');
</script> -->

@endsection
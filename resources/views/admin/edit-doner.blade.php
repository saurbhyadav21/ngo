@extends('layouts.admin-layout')

@section('title', 'Home - Admin Dashboard')

@section('content')

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
  <h4 class="mb-4 custom-margin">Updation Form</h4>
  @if(session('success'))
  <div class="alert alert-success mt-3">
    {{ session('success') }}
  </div>
@endif
    <form id="post-add-form" action="{{ route('edit-doner-store',['id'=>$doner->id]) }}" method="POST" enctype="multipart/form-data">
     @csrf
     <div class="row mb-3">
         <div class="col-md-6">
        <label class="form-label">Name<span>*</span> </label>
        <input type="text" class="form-control" name="name" value="{{ $doner->name }}" required>
      </div>
      
       <div class="col-md-6">
        <label class="form-label">Photo  </label>
        <input type="file" class="form-control" name="image" >
         @if($doner->image)
        <small class="form-text text-muted mt-2">
            Already uploaded: 
            <a href="{{ asset('storage/uploads/'. $doner->image) }}" target="_blank">View Photo</a>
        </small>
        @else
         <small class="form-text text-muted mt-2">
            No Image: 
           
        </small>
    @endif
      </div>
      </div>
    <div class="row mb-3">
      <div class="col-md-6">
        <label class="form-label">Amount <span>*</span></label>
        <input type="text" class="form-control" name="amount" value="{{ $doner->amount }}" readonly>
      </div>
      <div class="col-md-6">
        <label class="form-label">Mobile No. <span>*</span></label>
        <input type="text" class="form-control" name="phone" value="{{ $doner->phone }}" required>

      </div>
    </div>

    <div class="row mb-3">
      <div class="col-md-6">
        <label class="form-label">Email </label>
        <input type="text" class="form-control" name="email" value="{{ $doner->email }}" >

      </div>
      <div class="col-md-6">
        <label class="form-label">Address <span>*</span></label>
        <input type="text" class="form-control" name="address" value="{{ $doner->address }}" >

      </div>
    
    </div>
    <div class="row mb-3">
      <div class="col-md-6">
        <label class="form-label">Pancard</label>
        <input type="text" class="form-control" name="pancard" value="{{ $doner->pancard }}" >

      </div>
      
    </div>

    <button type="submit" class="btn btn-primary mt-4" style="width: 100%; cursor: pointer;">Update</button>
  </form>
  <a href="{{ url()->previous() }}" class="btn btn-secondary w-100 mt-2">Back</a>
</div>





@endsection
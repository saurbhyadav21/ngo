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
    <form id="post-add-form" action="{{ route('edit-management-store',['id'=>$management->id]) }}" method="POST" enctype="multipart/form-data">
     @csrf
     <div class="row mb-3">
         <div class="col-md-6">
        <label class="form-label"> Full Name:<span>*</span> </label>
        <input type="text" class="form-control" name="name" value="{{ $management->name }}" required>
      </div>
      
       <div class="col-md-6">
        <label class="form-label">Photo  </label>
        <input type="file" class="form-control" name="image" >
         @if($management->image)
        <small class="form-text text-muted mt-2">
            Already uploaded: 
            <a href="{{ asset('storage/uploads/'. $management->image) }}" target="_blank">View Photo</a>
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
        <label class="form-label">Designation <span>*</span></label>
        <input type="text" class="form-control" name="designation" value="{{ $management->designation }}" readonly>
      </div>
      <div class="col-md-6">
        <label class="form-label">Mobile No. <span>*</span></label>
        <input type="text" class="form-control" name="mobile" value="{{ $management->mobile }}" required>

      </div>
    </div>

    <div class="row mb-3">
      <div class="col-md-6">
        <label class="form-label">Email </label>
        <input type="text" class="form-control" name="email" value="{{ $management->email }}" >

      </div>
      <div class="col-md-6">
        <label class="form-label">Category <span>*</span></label>
         <select name="category" class="form-control">
    <option value="" disabled {{ $management->category == '' ? 'selected' : '' }}>Select Category</option>
    <option value="International" {{ $management->category == 'International' ? 'selected' : '' }}>International</option>
    <option value="National" {{ $management->category == 'National' ? 'selected' : '' }}>National</option>
    <option value="Andhra Pradesh" {{ $management->category == 'Andhra Pradesh' ? 'selected' : '' }}>Andhra Pradesh</option>
    <option value="Andaman and Nicobar Islands" {{ $management->category == 'Andaman and Nicobar Islands' ? 'selected' : '' }}>Andaman and Nicobar Islands</option>
    <option value="Arunachal Pradesh" {{ $management->category == 'Arunachal Pradesh' ? 'selected' : '' }}>Arunachal Pradesh</option>
    <option value="Assam" {{ $management->category == 'Assam' ? 'selected' : '' }}>Assam</option>
    <option value="Bihar" {{ $management->category == 'Bihar' ? 'selected' : '' }}>Bihar</option>
    <option value="Chandigarh" {{ $management->category == 'Chandigarh' ? 'selected' : '' }}>Chandigarh</option>
    <option value="Chhattisgarh" {{ $management->category == 'Chhattisgarh' ? 'selected' : '' }}>Chhattisgarh</option>
    <option value="Dadar and Nagar Haveli" {{ $management->category == 'Dadar and Nagar Haveli' ? 'selected' : '' }}>Dadar and Nagar Haveli</option>
    <option value="Daman and Diu" {{ $management->category == 'Daman and Diu' ? 'selected' : '' }}>Daman and Diu</option>
    <option value="Delhi" {{ $management->category == 'Delhi' ? 'selected' : '' }}>Delhi</option>
    <option value="Lakshadweep" {{ $management->category == 'Lakshadweep' ? 'selected' : '' }}>Lakshadweep</option>
    <option value="Puducherry" {{ $management->category == 'Puducherry' ? 'selected' : '' }}>Puducherry</option>
    <option value="Goa" {{ $management->category == 'Goa' ? 'selected' : '' }}>Goa</option>
    <option value="Gujarat" {{ $management->category == 'Gujarat' ? 'selected' : '' }}>Gujarat</option>
    <option value="Haryana" {{ $management->category == 'Haryana' ? 'selected' : '' }}>Haryana</option>
    <option value="Himachal Pradesh" {{ $management->category == 'Himachal Pradesh' ? 'selected' : '' }}>Himachal Pradesh</option>
    <option value="Jammu and Kashmir" {{ $management->category == 'Jammu and Kashmir' ? 'selected' : '' }}>Jammu and Kashmir</option>
    <option value="Jharkhand" {{ $management->category == 'Jharkhand' ? 'selected' : '' }}>Jharkhand</option>
    <option value="Karnataka" {{ $management->category == 'Karnataka' ? 'selected' : '' }}>Karnataka</option>
    <option value="Kerala" {{ $management->category == 'Kerala' ? 'selected' : '' }}>Kerala</option>
    <option value="Madhya Pradesh" {{ $management->category == 'Madhya Pradesh' ? 'selected' : '' }}>Madhya Pradesh</option>
    <option value="Maharashtra" {{ $management->category == 'Maharashtra' ? 'selected' : '' }}>Maharashtra</option>
    <option value="Manipur" {{ $management->category == 'Manipur' ? 'selected' : '' }}>Manipur</option>
    <option value="Meghalaya" {{ $management->category == 'Meghalaya' ? 'selected' : '' }}>Meghalaya</option>
    <option value="Mizoram" {{ $management->category == 'Mizoram' ? 'selected' : '' }}>Mizoram</option>
    <option value="Nagaland" {{ $management->category == 'Nagaland' ? 'selected' : '' }}>Nagaland</option>
    <option value="Odisha" {{ $management->category == 'Odisha' ? 'selected' : '' }}>Odisha</option>
    <option value="Punjab" {{ $management->category == 'Punjab' ? 'selected' : '' }}>Punjab</option>
    <option value="Rajasthan" {{ $management->category == 'Rajasthan' ? 'selected' : '' }}>Rajasthan</option>
    <option value="Sikkim" {{ $management->category == 'Sikkim' ? 'selected' : '' }}>Sikkim</option>
    <option value="Tamil Nadu" {{ $management->category == 'Tamil Nadu' ? 'selected' : '' }}>Tamil Nadu</option>
    <option value="Telangana" {{ $management->category == 'Telangana' ? 'selected' : '' }}>Telangana</option>
    <option value="Tripura" {{ $management->category == 'Tripura' ? 'selected' : '' }}>Tripura</option>
    <option value="Uttar Pradesh" {{ $management->category == 'Uttar Pradesh' ? 'selected' : '' }}>Uttar Pradesh</option>
    <option value="Uttarakhand" {{ $management->category == 'Uttarakhand' ? 'selected' : '' }}>Uttarakhand</option>
    <option value="West Bengal" {{ $management->category == 'West Bengal' ? 'selected' : '' }}>West Bengal</option>
</select>


      </div>
    
    </div>
    <div class="row mb-3">
      <div class="col-md-6">
        <label class="form-label">Position</label>
        <input type="text" class="form-control" name="position" value="{{ $management->position }}" >

      </div>
      
    </div>

    <button type="submit" class="btn btn-primary mt-4" style="width: 100%; cursor: pointer;">Update</button>
  </form>
  <a href="{{ url()->previous() }}" class="btn btn-secondary w-100 mt-2">Back</a>
</div>





@endsection
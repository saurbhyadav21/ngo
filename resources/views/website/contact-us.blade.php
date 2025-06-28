@extends('layouts.header')

@section('title', 'Header List')

@section('content')

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

 .amount-btn {
        min-width: 200px;
        min-height: 60px;
        text-align: center;
    }
    .dot{
        color: red;
    }
    
    .product-group { margin-bottom: 10px; }
  </style>
<div class="container mt-4 mb-5" >
  <h4 class="mb-4 custom-margin text-center"style="margin-top: 150px; font-weight: 800; color:rgba(0, 146, 69, 1) ">Contact Us</h4>
  @if(session('success'))
  <div class="alert alert-success mt-3">
    {{ session('success') }}
  </div>
@endif
    <form id="post-add-form" action="{{ route('create-contact-list-website') }}" method="POST" enctype="multipart/form-data">
     @csrf
    
    <div class="row mb-3"> 
       <div class="col-md-6">
        <label class="form-label">Name :<span class="dot">*</span></label>
        <input type="text" class="form-control" name="name" required>
      </div>
      <div class="col-md-6">
        <label class="form-label">Mobile No. :<span class="dot">*</span></label>
        <input type="text" class="form-control" name="phone" required>
      </div>
    </div>

    <div class="row mb-3">
      <div class="col-md-6">
        <label class="form-label">Email: <span class="dot">*</span></label>
        <input type="email" class="form-control" name="email">
      </div>
      <div class="col-md-6">
        <label class="form-label">topic: <span class="dot">*</span></label>
        <input type="text" class="form-control" name="topic">
      </div>
    </div>

    <div class="row mb-3">    
     <div class="col-12">
        <label class="form-label">Description:<span class="dot" >*</span></label>
           <textarea class="form-control" name="description" rows="3" required></textarea>
      </div>
    </div>
 

    <button type="submit" class="btn btn-primary mt-4 w-100"
    
     style="
                            background: linear-gradient(122deg, rgba(0, 146, 69, 1) 0%, rgba(135, 190, 65, 1) 100%);
                            
                            ">Submit</button>
  </form>
</div>



@endsection
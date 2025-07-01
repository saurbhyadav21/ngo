@extends('layouts.header')


@section('content')
  
 <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">  -->

<style>
     @media (max-width: 991px) {
        .sub{
            margin-top: 10px;
        }
        
    .custom-margin {
      margin-top: 0px !important;
    }
  }

  /* span{
    color: red;
  } */

  label{
    font-weight: bold;
  }
  .dot{
    color: red;
  }
    
    .product-group { margin-bottom: 10px; }
  </style>
  <h3 class="mb-4 text-center" style="margin-top: 150px; font-weight: 800; color:rgba(0, 146, 69, 1)">Registration Form</h3>

<div class="container" style="margin: 20px 110px 0 110px; border: 1px solid #ccc; padding: 20px; background-color: white; box-shadow: 0 2px 8px rgba(0,0,0,0.1); border-radius: 2%;">


  @if(session('success'))
  <div class="alert alert-success mt-3">
    {{ session('success') }}
  </div>
@endif
    <form id="post-add-form" action="{{ route('update-member') }}" method="POST" enctype="multipart/form-data">
     @csrf
    <input type="hidden" name="registered_by" value="self"> <!-- Website side -->

    <div class="row mb-3"> 
       <div class="col-md-6">
        <label class="form-label">Name: <span class="dot">*</span></label>
        <input type="text" class="form-control" name="name" id="name" required minlength="3">
          <small id="nameError" class="text-danger d-none">Name must be at least 3 characters long.</small>
      </div>
   <div class="col-md-6">
  <label class="form-label">Email:<span class="dot">*</span></label>
  <input type="email" class="form-control" name="email" id="email" required>
  <small id="emailError" class="text-danger d-none">Please enter a valid email address.</small>
</div>

      
    </div>
    <div class="row mb-3">
        <div class="col-md-6">
                <label class="form-label">Gender <span class="dot">*</span></label>
                <select class="form-control" name="gender" required>
                    <option value="" disabled>Select</option>
                    <option value="Male" >Male</option>
                    <option value="Female" >Female</option>
                    <option value="Other" >Other</option>
                </select>
            </div>
    <div class="col-md-6">
  <label class="form-label">Mobile No. <span class="dot">*</span></label>
  <input type="text" class="form-control" name="phone" id="phone" required maxlength="10">
  <small id="phoneError" class="text-danger d-none">Please enter a valid 10-digit mobile number.</small>
</div>

      
    </div>



    <div class="row mb-3">    
       <div class="col-md-6">
  <label class="form-label">Date Of Birth:<span class="dot">*</span></label>
  <input type="date" class="form-control" name="dob" id="dobField" required>
</div>
        <div class="col-md-6">
    <label class="form-label">Blood Group:<span class="dot">*</span> </label>
    <select class="form-control" name="blood_group" required>
        <option value="" disabled selected>Select Blood Group</option>
        <option value="A+">A+</option>
        <option value="A-">A-</option>
        <option value="B+">B+</option>
        <option value="B-">B-</option>
        <option value="AB+">AB+</option>
        <option value="AB-">AB-</option>
        <option value="O+">O+</option>
        <option value="O-">O-</option>
    </select>
</div>
      
    </div>
<div class="row mb-3">
  <div class="col-md-6">
  <label for="state">State</label>
  <select name="state" id="state" class="form-control" required>
    <option value="">-- Select State --</option>
    @foreach($states as $state)
      <option value="{{ $state->id }}">{{ $state->name }}</option>
    @endforeach
  </select>
</div>

  <div class="col-md-6">
    <label class="form-label">City:<span class="dot">*</span></label>
    <input type="text" class="form-control" name="city" required>
  </div>
</div>

<div class="row mb-3"> 
    <div class="col-12">
        <label class="form-label">Address <span class="dot">*</span></label>
           <textarea class="form-control" name="address" rows="3" required></textarea>
      </div>
    </div>
<div class="row mb-3"> 
  <div class="col-md-6">
    <label class="form-label">Pincode:<span class="dot">*</span></label>
    <input type="text" class="form-control" name="pincode" required>
  </div>

  <div class="col-md-3">
    <label class="form-label">Relation:<span class="dot">*</span></label>
    <select class="form-control" onchange="sdw()" id="sdwType" name="sdw_type" required>
      <option value="S/O">S/O</option>
      <option value="D/O">D/O</option>
      <option value="W/O">W/O</option>
    </select>
  </div>

  <div class="col-md-3">
    <label class="form-label">&nbsp;</label> <!-- for spacing alignment -->
    <input type="text" name="sdw_name" required class="form-control" id="sdwName" placeholder="Son of"required>
  </div>
</div>
<!-- <div class="row mb-3">
 
</div> -->

    <div class="row mb-3">
      <div class="col-md-6">
        <label class="form-label">Photo (Optional):</label>
        <input type="file" class="form-control" name="image">
      </div>
     <div class="col-md-6">
  <label class="form-label">Aadhar No.:<span class="dot">*</span></label>
  <input type="text" class="form-control" name="aadhar_number" id="aadhar_number" required maxlength="12">
  <small id="aadharError" class="text-danger d-none">Please enter a valid 12-digit Aadhar number.</small>
</div>

    
    </div>
    <!-- <div class="row mb-3">
      <div class="col-md-6">
        <label class="form-label">Validity Start:<span>*</span></label>
        <input type="date" class="form-control" name="validity_start">
      </div>
      <div class="col-md-6">
        <label class="form-label">Validity End:<span>*</span></label>
        <input type="date" class="form-control" name="validity_end">
      </div>
    </div> -->
    <div class="row mb-3">
<div class="col-md-12 ">
  <label class="form-label">Profession <span class="dot">*</span></label>
  <select class="form-control" name="profession" required>
    <option value="" disabled selected>Select Profession</option>
    <option value="Government Employee">Government Employee</option>
    <option value="Private Job">Private Job</option>
    <option value="Self Employed">Self Employed</option>
    <option value="Business">Business</option>
    <option value="Farmer">Farmer</option>
    <option value="Student">Student</option>
    <option value="Retired">Retired</option>
    <option value="Unemployed">Unemployed</option>
    <option value="Other">Other</option>
  </select>
</div>

      <!-- <div class="col-md-6">
        <label class="form-label">Authority:<span>*</span></label>
        <input type="text" class="form-control" name="Authority"required>
      </div> -->
      </div>
<div class="row mb-3">
  <div class="col-md-6">
    <label class="form-label">Select Your ID:<span class="dot">*</span></label>
    <select class="form-control" name="id_type" >
      <option value="">-- Select ID Type --</option>
      <option value="Aadhaar Card">Aadhaar Card</option>
      <option value="PAN Card">PAN Card</option>
      <option value="Voter ID">Voter ID</option>
      <option value="Driving License">Driving License</option>
      <option value="Passport">Passport</option>
      <option value="RasanCard">RasanCard</option>
      <option value="Marksheet">10th Marksheet</option>
    </select>
  </div>

  <div class="col-md-6">
    <label class="form-label">Upload ID Proof:</label>
    <input type="file" name="id_file" class="form-control" accept=".jpg,.jpeg,.png,.pdf" >
  </div>
</div>

<div class="col-md-6 mb-3">
  <label class="form-label">Other Document:</label>
  <input type="file" name="other_document" class="form-control" accept=".jpg,.jpeg,.png,.pdf">
</div>

<!-- <div class="row mb-3">
  <label class="form-label">Remarks:<span>*</span></label>
  <textarea class="form-control" name="remarks" rows="3" placeholder="Enter your remarks here..."></textarea>
</div> -->

    <button type="submit" class="btn mt-4 w-100 mb-4" style="
    background: linear-gradient(122deg, rgba(0, 146, 69, 1) 0%, rgba(135, 190, 65, 1) 100%);
    
    ">Submit</button>

  </form>
</div>



<script>

    function sdw() {
    const type = document.getElementById('sdwType').value;
    const input = document.getElementById('sdwName');

    if (type === 'S/O') {
      input.placeholder = "Son of";
    } else if (type === 'D/O') {
      input.placeholder = "Daughter of";
    } else if (type === 'W/O') {
      input.placeholder = "Wife of";
    }
  }

  // Optional: run on page load to sync placeholder
  window.onload = sdw;


    const today = new Date();
  today.setDate(today.getDate() - 1); // to disallow today
  const yyyy = today.getFullYear();
  const mm = String(today.getMonth() + 1).padStart(2, '0'); // Months are 0-based
  const dd = String(today.getDate()).padStart(2, '0');
  const maxDate = `${yyyy}-${mm}-${dd}`;
  
  document.getElementById('dobField').setAttribute('max', maxDate);


    document.addEventListener("DOMContentLoaded", function () {
    const emailInput = document.getElementById("email");
    const emailError = document.getElementById("emailError");

    emailInput.addEventListener("input", function () {
      const emailValue = emailInput.value;
      const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

      if (!emailPattern.test(emailValue)) {
        emailError.classList.remove("d-none");
      } else {
        emailError.classList.add("d-none");
      }
    });
  });

    document.addEventListener("DOMContentLoaded", function () {
    const phoneInput = document.getElementById("phone");
    const phoneError = document.getElementById("phoneError");

    phoneInput.addEventListener("input", function () {
      const phoneValue = phoneInput.value;
      const phonePattern = /^[6-9]\d{9}$/; // Indian numbers starting from 6,7,8,9

      if (!phonePattern.test(phoneValue)) {
        phoneError.classList.remove("d-none");
      } else {
        phoneError.classList.add("d-none");
      }
    });
  });

    document.addEventListener("DOMContentLoaded", function () {
    const aadharInput = document.getElementById("aadhar_number");
    const aadharError = document.getElementById("aadharError");

    aadharInput.addEventListener("input", function () {
      const aadharValue = aadharInput.value;
      const aadharPattern = /^\d{12}$/; // Exactly 12 digits

      if (!aadharPattern.test(aadharValue)) {
        aadharError.classList.remove("d-none");
      } else {
        aadharError.classList.add("d-none");
      }
    });
  });
document.addEventListener("DOMContentLoaded", function () {
    const nameInput = document.getElementById("name");
    const nameError = document.getElementById("nameError");

    nameInput.addEventListener("input", function () {
        const nameValue = nameInput.value.trim();

        if (nameValue.length < 3) {
            nameError.classList.remove("d-none");
        } else {
            nameError.classList.add("d-none");
        }
    });
});
</script>


@endsection 

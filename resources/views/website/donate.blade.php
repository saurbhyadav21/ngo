@extends('layouts.header')

@section('title', 'Header List')

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

 .amount-btn {
        min-width: 200px;
        min-height: 60px;
        text-align: center;
        border: 2px solid rgba(0, 146, 69, 1) ;
    }
    .dot{
        color: red;
    }
    .amount-btn:hover {
  background: var(--primary-color) !important;
 
}
    
    .product-group { margin-bottom: 10px; }
  </style>
<div class="container mt-4 mb-5" style="background-color: white; box-shadow: 0 2px 8px rgba(0,0,0,0.1); border-radius: 2%;" >
  <h4 class="mb-4 custom-margin text-center pt-3"style="margin-top: 150px; font-weight: 800; color:rgba(0, 146, 69, 1) ">Donate Form</h4>
  @if(session('success'))
  <div class="alert alert-success mt-3">
    {{ session('success') }}
  </div>
@endif
    <form id="post-add-form" action="{{ route('store-doner') }}" method="POST" enctype="multipart/form-data">
     @csrf
    
    <div class="row mb-3"> 
       <div class="col-md-6">
        <label class="form-label">Name: <span class="dot">*</span></label>
        <input type="text" class="form-control" name="name" id="name" required minlength="3">
          <small id="nameError" class="text-danger d-none">Name must be at least 3 characters long.</small>
      </div>
      <div class="col-md-6">
         <label class="form-label">Mobile No. <span class="dot">*</span></label>
  <input type="text" class="form-control" name="phone" id="phone" required maxlength="10">
  <small id="phoneError" class="text-danger d-none">Please enter a valid 10-digit mobile number.</small>
      </div>
    </div>

    <div class="row mb-3">
      <div class="col-md-6">
         <label class="form-label">Email:<span class="dot">*</span></label>
  <input type="email" class="form-control" name="email" id="email" required>
  <small id="emailError" class="text-danger d-none">Please enter a valid email address.</small>
      </div>
      <div class="col-md-6">
        <label class="form-label">Pancard No. (Optional):</label>
        <input type="text" class="form-control" name="pancard">
      </div>
    </div>

    <div class="row mb-3">    
     <div class="col-12">
        <label class="form-label">Address <span class="dot" >*</span></label>
           <textarea class="form-control" name="address" rows="3" required></textarea>
      </div>
    </div>

    <div class="row mb-3">
      <div class="col-md-6">
        <label class="form-label">Photo (Optional):</label>
        <input type="file" class="form-control" name="image">
      </div>
       <div class="col-md-6">
        <label class="form-label">Payment Receipt Upload (Optional):</label>
        <input type="file" class="form-control" name="payment_receipt">
      </div>
    
    </div>
    <div class="row mb-3">
    <div class="col-md-12">
        <label class="form-label d-block">Amount <span class="dot">*</span></label>
        <div class="d-flex flex-wrap gap-3">
            @foreach ([100, 200, 500, 1000, 5000] as $val)
                <button type="button" class="btn  amount-btn " data-value="{{ $val }}">
                    ₹{{ $val }}
                </button>
            @endforeach
            <button type="button" class="btn btn-outline-secondary amount-btn" data-value="other">Other</button>
        </div>

        <!-- Hidden input to submit amount -->
        <input type="hidden" name="amount" id="selected-amount" required>

        <!-- Show this only when "Other" selected -->
        <div id="other-amount-field" class="mt-3" style="display: none;">
            <label for="other-amount" class="form-label">Enter Custom Amount</label>
            <input type="number" class="form-control" id="other-amount" min="1" placeholder="Enter amount">
        </div>
    </div>
</div>


    <button type="submit" class="btn btn-primary mt-4 w-100 mb-4" style="background: var(--primary-color);">Submit</button>
  </form>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const amountButtons = document.querySelectorAll('.amount-btn');
        const selectedAmountInput = document.getElementById('selected-amount');
        const otherAmountField = document.getElementById('other-amount-field');
        const otherAmountInput = document.getElementById('other-amount');

        amountButtons.forEach(button => {
            button.addEventListener('click', function () {
                const value = this.getAttribute('data-value');

                amountButtons.forEach(btn => btn.classList.remove('active'));
                this.classList.add('active');

                if (value === 'other') {
                    otherAmountField.style.display = 'block';
                    selectedAmountInput.value = ''; // clear hidden field
                } else {
                    otherAmountField.style.display = 'none';
                    otherAmountInput.value = '';
                    selectedAmountInput.value = value;
                }
            });
        });

        // Update hidden input when user types custom amount
        otherAmountInput.addEventListener('input', function () {
            selectedAmountInput.value = this.value;
        });
    });

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
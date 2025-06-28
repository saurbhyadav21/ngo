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
    }
    .dot{
        color: red;
    }
    
    .product-group { margin-bottom: 10px; }
  </style>
<div class="container mt-4 mb-5" >
  <h4 class="mb-4 custom-margin text-center"style="margin-top: 150px; font-weight: 800; color:rgba(0, 146, 69, 1) ">Donate Form</h4>
  @if(session('success'))
  <div class="alert alert-success mt-3">
    {{ session('success') }}
  </div>
@endif
    <form id="post-add-form" action="{{ route('store-doner') }}" method="POST" enctype="multipart/form-data">
     @csrf
    
    <div class="row mb-3"> 
       <div class="col-md-6">
        <label class="form-label">Name <span class="dot">*</span></label>
        <input type="text" class="form-control" name="name" required>
      </div>
      <div class="col-md-6">
        <label class="form-label">Mobile No. <span class="dot">*</span></label>
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
                <button type="button" class="btn btn-outline-primary amount-btn " data-value="{{ $val }}">
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


    <button type="submit" class="btn btn-primary mt-4 w-100">Submit</button>
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
</script>

@endsection
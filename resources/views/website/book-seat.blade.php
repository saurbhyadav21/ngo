@extends('layouts.header')

@section('title', 'Complain / Suggestion')

@section('content')

<style>
    .dot {
        color: red;
    }

    .amount-btn {
        min-width: 200px;
        min-height: 60px;
        text-align: center;
    }

    .product-group {
        margin-bottom: 10px;
    }

    @media (max-width: 991px) {
        .custom-margin {
            margin-top: 0px !important;
        }

        .sub {
            margin-top: 10px;
        }
    }
</style>

<div class="container mt-4 mb-5">
    <h4 class="mb-4 text-center" style="margin-top: 140px; font-weight: 800; color:rgba(0, 146, 69, 1)">Book Seat</h4>

    @if(session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif
  <div class="alert alert-info mb-4">
        You are booking a seat for event ID <strong>{{ $id }}</strong>.
    </div>
    <form id="post-add-form" action="{{ route('seat-booked',['event_id'=>$id]) }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">Full Name: <span class="dot">*</span></label>
                <input type="text" class="form-control" name="name" required>
            </div>

            <div class="col-md-6">
                <label class="form-label">Mobile No.: <span class="dot">*</span></label>
                <input type="text" class="form-control" name="phone" required>
            </div>
        </div>
        <div class="row mb-3">
        <div class="col-md-6">
            <label class="form-label">City: <span class="dot">*</span></label>
            <input type="text" class="form-control" name="city" required>
        </div>
        <div class="col-md-6">
    <label class="form-label">Are you in team?</label>
    <div>
        <input type="radio" name="in_team" value="yes" id="teamYes"> <label for="teamYes">Yes</label>
        <input type="radio" name="in_team" value="no" id="teamNo" checked> <label for="teamNo">No</label>
    </div>
    </div>
        </div>


<!-- Hidden field: ID Number -->
<div class="mb-3" id="idNumberField" style="display: none;">
    <label class="form-label">ID Number: <span class="dot">*</span></label>
    <input type="text" class="form-control" name="id_number" id="idNumberInput">
</div>


       

        <button type="submit" class="btn btn-primary mt-2 w-100" style="background: linear-gradient(122deg, rgba(0, 146, 69, 1) 0%, rgba(135, 190, 65, 1) 100%); border: none;">
            Submit
        </button>
    </form>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const teamYes = document.getElementById('teamYes');
        const teamNo = document.getElementById('teamNo');
        const idField = document.getElementById('idNumberField');
        const idInput = document.getElementById('idNumberInput');
        const form = document.getElementById('post-add-form');

        function toggleIdField() {
            if (teamYes.checked) {
                idField.style.display = 'block';
                idInput.setAttribute('required', 'required');
            } else {
                idField.style.display = 'none';
                idInput.removeAttribute('required');
                idInput.value = '';
            }
        }

        teamYes.addEventListener('change', toggleIdField);
        teamNo.addEventListener('change', toggleIdField);

        // Optional: Validate on submit
        form.addEventListener('submit', function (e) {
            if (teamYes.checked && idInput.value.trim() === '') {
                e.preventDefault();
                alert("Please enter your ID Number.");
                idInput.focus();
            }
        });
    });
</script>


@endsection

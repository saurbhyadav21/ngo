@extends('layouts.header')

@section('title', 'Complain / Suggestion')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center" style="margin-top:130px;">
        <!-- Left Column: Membership Fee Details -->
        <div class="col-md-7 border rounded shadow-lg p-4 bg-white mb-4 mb-md-0" style="margin-top: 50px; height: 200px;">
            <h5 class="fw-bold mb-3 text-success">Membership Fee Details</h5>

            <div class="text-muted" style="white-space: pre-line;">
                {!! nl2br(e($company->membership_charges_details)) !!}
            </div>
        </div>

        <!-- Right Column: QR Code and Pay Button -->
        <div class="col-md-5 d-flex flex-column justify-content-center align-items-center text-center" >
            <h6 class="fw-bold mb-3">Scan & Pay</h6>

            @if($company->qrcode_image)
                <img src="{{ asset('storage/uploads/' . $company->qrcode_image) }}"
                     alt="QR Code" class="img-fluid mb-3" style="max-width: 250px;">
            @else
                <p class="text-danger">QR Code not available.</p>
            @endif

            
        </div>
        <!-- Pay Online Button -->
            <a href="#" class="btn btn-success px-4 py-2 mt-2" style="border-radius: 8px;background: linear-gradient(122deg, rgba(0, 146, 69, 1) 0%, rgba(135, 190, 65, 1) 100%); border: none;">
                Pay Online
            </a>
    </div>
</div>
@endsection

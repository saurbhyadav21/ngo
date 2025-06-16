@extends('layouts.admin-layout')

@section('title', 'Edit Manager')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>

<style>
    @media (max-width: 991px) {
        .sub {
            margin-top: 10px;
        }
        .custom-margin {
            margin-top: 0px !important;
        }
    }
    span {
        color: red;
    }
    body{
        margin: 20px;
    }
</style>

<div class="container mt-4 mb-5">
    <h4 class="mb-4 custom-margin">Edit Manager Form</h4>

    @if(session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('updateCompanyProfile',['id'=>$companyDetails->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">Brand Name: <span>*</span></label>
                <input type="text" class="form-control" name="brand_name" value="{{ $companyDetails->brand_name }}" required>
            </div>

            <div class="col-md-6">
                <label class="form-label">Email: <span>*</span></label>
                <input type="email" class="form-control" name="email" value="{{ $companyDetails->email }}" required>
            </div>
        </div>
         <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">Website Name: <span>*</span></label>
                <input type="text" class="form-control" name="website_name" value="{{ $companyDetails->website_name }}" required>
            </div>

            <div class="col-md-6">
                <label class="form-label">Facebook Link <span>*</span></label>
                <input type="text" class="form-control" name="facebook_link" value="{{ $companyDetails->facebook_link }}" required>
            </div>
        </div>

         <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">Twitter Name:<span>*</span></label>
                <input type="text" class="form-control" name="twitter_link" value="{{ $companyDetails->twitter_link }}" required>
            </div>

            <div class="col-md-6">
                <label class="form-label">Instagram Link:<span>*</span></label>
                <input type="text" class="form-control" name="instagram_link" value="{{ $companyDetails->instagram_link }}" required>
            </div>
        </div>

         <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">Youtube Link:<span>*</span></label>
                <input type="text" class="form-control" name="youtube_link" value="{{ $companyDetails->youtube_link }}" required>
            </div>

            <div class="col-md-6">
                <label class="form-label">Facebook Page Link:<span>*</span></label>
                <input type="text" class="form-control" name="facebookpage_link" value="{{ $companyDetails->facebookpage_link }}" required>
            </div>
        </div>

         <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">WhatsApp Link Number: <span>*</span></label>
                <input type="text" class="form-control" name="whatsapp_link_number" value="{{ $companyDetails->whatsapp_link_number }}" required>
            </div>

            <div class="col-md-6">
                <label class="form-label">Mobile: <span>*</span></label>
                <input type="text" class="form-control" name="mobile" value="{{ $companyDetails->mobile }}" required>
            </div>
        </div>

         <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">Site Key: <span>*</span></label>
                <input type="text" class="form-control" name="site_key" value="{{ $companyDetails->site_key }}" required>
            </div>

            <div class="col-md-6">
                <label class="form-label">Secret Key: <span>*</span></label>
                <input type="text" class="form-control" name="secret_key" value="{{ $companyDetails->secret_key }}" required>
            </div>
        </div>

         <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label"> Address: <span>*</span></label>
                <input type="text" class="form-control" name="address" value="{{ $companyDetails->address }}" required>
            </div>

            <div class="col-md-6">
                <label class="form-label"> Privacy Name: <span>*</span></label>
                <input type="text" class="form-control" name="privacy_name" value="{{ $companyDetails->privacy_name }}" required>
            </div>
        </div>

<div class="row mb-3">
      <div class="col-12">
       <label for="description">About Us:<span>*</span></label>
        <textarea name="aboutus" id="editor1" class="form-control" rows="5">{{ $companyDetails->aboutus}}</textarea>
      </div>
    </div><div class="row mb-3">
      <div class="col-12">
       <label for="Privacy Policy">Privacy Policy:<span>*</span></label>
        <textarea name="privacy_policy" id="editor2" class="form-control" rows="5">{{ $companyDetails->privacy_policy}}</textarea>
      </div>
    </div><div class="row mb-3">
      <div class="col-12">
       <label for="Terms & Condition">Terms & Condition:<span>*</span></label>
        <textarea name="tnc" id="editor3" class="form-control" rows="5">{{ $companyDetails->tnc}}</textarea>
      </div>
    </div><div class="row mb-3">
      <div class="col-12">
       <label for="Disclaimer">Disclaimer:<span>*</span></label>
        <textarea name="disclaimer" id="editor4" class="form-control" rows="5">{{ $companyDetails->disclaimer}}</textarea>
      </div>
    </div><div class="row mb-3">
      <div class="col-12">
       <label for="Refund Policy">Refund Policy:<span>*</span></label>
        <textarea name="refund_policy" id="editor5" class="form-control" rows="5">{{ $companyDetails->refund_policy}}</textarea>
      </div>
    </div>

      <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">Website Logo</label>
                <input type="file" class="form-control" name="website_logo">
                @if($companyDetails->website_logo)
                    <small class="form-text text-muted mt-2">
                        Already uploaded:
                        <a href="{{ asset('storage/uploads/' . $companyDetails->website_logo) }}" target="_blank">View Website logo</a>
                    </small>
                    @else
                     <small class="form-text text-muted mt-2">
                        No Image:
                    </small>
                @endif
            </div>
             <div class="col-md-6">
                <label class="form-label">Signature Pic</label>
                <input type="file" class="form-control" name="signature_pic">
                @if($companyDetails->signature_pic)
                    <small class="form-text text-muted mt-2">
                        Already uploaded:
                        <a href="{{ asset('storage/uploads/' . $companyDetails->signature_pic) }}" target="_blank">View Signature Pic</a>
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
                <label class="form-label">Id Card Front</label>
                <input type="file" class="form-control" name="id_card_front">
                @if($companyDetails->id_card_front)
                    <small class="form-text text-muted mt-2">
                        Already uploaded:
                        <a href="{{ asset('storage/uploads/' . $companyDetails->id_card_front) }}" target="_blank">View id_card_front</a>
                    </small>
                    @else
                     <small class="form-text text-muted mt-2">
                        No Image:
                    </small>
                @endif
            </div>
             <div class="col-md-6">
                <label class="form-label">Id Card Back</label>
                <input type="file" class="form-control" name="id_card_back">
                @if($companyDetails->id_card_back)
                    <small class="form-text text-muted mt-2">
                        Already uploaded:
                        <a href="{{ asset('storage/uploads/' . $companyDetails->id_card_back) }}" target="_blank">View Id Card Back</a>
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
                <label class="form-label">Certificate</label>
                <input type="file" class="form-control" name="certificate">
                @if($companyDetails->certificate)
                    <small class="form-text text-muted mt-2">
                        Already uploaded:
                        <a href="{{ asset('storage/uploads/' . $companyDetails->certificate) }}" target="_blank">View Certificate</a>
                    </small>
                    @else
                     <small class="form-text text-muted mt-2">
                        No Image:
                    </small>
                @endif
            </div>
             <div class="col-md-6">
                <label class="form-label">Niyukti</label>
                <input type="file" class="form-control" name="niyukti">
                @if($companyDetails->niyukti)
                    <small class="form-text text-muted mt-2">
                        Already uploaded:
                        <a href="{{ asset('storage/uploads/' . $companyDetails->niyukti) }}" target="_blank">View Niyukti</a>
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
                <label class="form-label">About Us Image</label>
                <input type="file" class="form-control" name="aboutus_image">
                @if($companyDetails->aboutus_image)
                    <small class="form-text text-muted mt-2">
                        Already uploaded:
                        <a href="{{ asset('storage/uploads/' . $companyDetails->aboutus_image) }}" target="_blank">View About Us Image</a>
                    </small>
                    @else
                     <small class="form-text text-muted mt-2">
                        No Image:
                    </small>
                @endif
            </div>
             <div class="col-md-6">
                <label class="form-label">Slip</label>
                <input type="file" class="form-control" name="slip">
                @if($companyDetails->slip)
                    <small class="form-text text-muted mt-2">
                        Already uploaded:
                        <a href="{{ asset('storage/uploads/' . $companyDetails->slip) }}" target="_blank">View Slip</a>
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
                <label class="form-label">President Image</label>
                <input type="file" class="form-control" name="president_image">
                @if($companyDetails->president_image)
                    <small class="form-text text-muted mt-2">
                        Already uploaded:
                        <a href="{{ asset('storage/uploads/' . $companyDetails->president_image) }}" target="_blank">View President Image</a>
                    </small>
                    @else
                     <small class="form-text text-muted mt-2">
                        No Image:
                    </small>
                @endif
            </div>
        </div>

<div class="row mb-3">
      <div class="col-12">
       <label for="description">President Message:<span>*</span></label>
        <textarea name="president_message" id="editor6" class="form-control" rows="5">{{ $companyDetails->president_message}}</textarea>
      </div>
    </div>
<div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">Website Link:<span>*</span></label>
                <input type="text" class="form-control" name="website_link" value="{{ $companyDetails->website_link }}" required>
             
            </div>
        </div>

 <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">	Youtube Video 1: <span>*</span></label>
                <input type="text" class="form-control" name="	youtube_video_1" value="{{ $companyDetails->youtube_video_1 }}" required>
            </div>

            <div class="col-md-6">
                <label class="form-label">	Youtube Video 2: <span>*</span></label>
                <input type="text" class="form-control" name="youtube_video_2" value="{{ $companyDetails->youtube_video_2 }}" required>
            </div>
        </div>
<div class="row mb-3">
      <div class="col-12">
       <label for="description">Membership Charges Details	:<span>*</span></label>
        <textarea name="membership_charges_details" id="editor7" class="form-control" rows="5">{{ $companyDetails->membership_charges_details	}}</textarea>
      </div>
    </div>

 <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">PlayStore App Link: <span>*</span></label>
                <input type="text" class="form-control" name="playstore_app_link" value="{{ $companyDetails->playstore_app_link }}" required>
            </div>

            <div class="col-md-6">
                <label class="form-label">Slider: <span>*</span></label>
                
                <select class="form-control" name="slider" required>
                    <option value="" disabled>Select</option>
                    <option value="Active" {{ $companyDetails->slider == 'Active' ? 'selected' : '' }}>Active</option>
                    <option value="Deactive" {{ $companyDetails->slider == 'Deactive' ? 'selected' : '' }}>Deactive</option>
                </select>
            </div>
            </div>
    <div class="row mb-3">
        <div class="col-md-6">
                <label class="form-label">QR Code Image</label>
                <input type="file" class="form-control" name="qrcode_image">
                @if($companyDetails->qrcode_image)
                    <small class="form-text text-muted mt-2">
                        Already uploaded:
                        <a href="{{ asset('storage/uploads/' . $companyDetails->qrcode_image) }}" target="_blank">View QR Code Image</a>
                    </small>
                    @else
                     <small class="form-text text-muted mt-2">
                        No Image:
                    </small>
                @endif
            </div>
            <div class="col-md-6">
                <label class="form-label">Payment Gateway Link: <span>*</span></label>
                <input type="text" class="form-control" name="payment_gateway_link" value="{{ $companyDetails->payment_gateway_link }}" required>
            </div>

    </div>
<div class="row mb-3">
      <div class="col-12">
       <label for="description">Payment Details	:<span>*</span></label>
        <textarea name="payment_details" id="editor8" class="form-control" rows="5">{{ $companyDetails->payment_details	}}</textarea>
      </div>
    </div>


                  

<div class="container mt-4">
    <div class="row">
        <!-- First box -->
        <div class="col-md-4 mb-3">
            <div class="p-3 border rounded text-center shadow-sm">
                <label for="donation1" class="form-label">Donation:<span>*</span></label>
                <input type="number"  name="donation_amount" id="donation1" class="form-control mt-2" placeholder="Add Donation Amount (₹100)" min="100"  value="100">
            </div>
        </div>

        <!-- Second box -->
      
    </div>
</div>




        <button type="submit" class="btn btn-primary mt-4 w-100">Update</button>
    </form>
</div>



<script>
    CKEDITOR.replace('editor1');
    CKEDITOR.replace('editor2');
    CKEDITOR.replace('editor3');
    CKEDITOR.replace('editor4');
    CKEDITOR.replace('editor5');
    CKEDITOR.replace('editor6');
    CKEDITOR.replace('editor7');
    CKEDITOR.replace('editor8');
</script>
@endsection

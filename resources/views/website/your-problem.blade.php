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
    <h4 class="mb-4 text-center" style="margin-top: 140px; font-weight: 800; color:rgba(0, 146, 69, 1)">Complain / Suggestion</h4>

    @if(session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif

    <form id="post-add-form" action="{{ route('add-your-problem') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">Name: <span class="dot">*</span></label>
                <input type="text" class="form-control" name="name" required>
            </div>

            <div class="col-md-6">
                <label class="form-label">Mobile No.: <span class="dot">*</span></label>
                <input type="text" class="form-control" name="phone" required>
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">City: <span class="dot">*</span></label>
            <input type="text" class="form-control" name="city" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Message: <span class="dot">*</span></label>
            <textarea class="form-control" name="message" rows="3" required></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Description: <span class="dot">*</span></label>
            <textarea class="form-control" name="description" rows="3" required></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Video URL: <span class="dot">*</span></label>
            <textarea class="form-control" name="video_url" rows="2" required></textarea>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">Upload Document 1:<span class="dot">*</span></label>
                <input type="file" class="form-control" name="upload_document_1">
            </div>

            <div class="col-md-6">
                <label class="form-label">Upload Document 2:<span class="dot">*</span></label>
                <input type="file" class="form-control" name="upload_document_2">
            </div>
        </div>

        <button type="submit" class="btn btn-primary mt-2 w-100" style="background: linear-gradient(122deg, rgba(0, 146, 69, 1) 0%, rgba(135, 190, 65, 1) 100%); border: none;">
            Submit
        </button>
    </form>
</div>

@endsection

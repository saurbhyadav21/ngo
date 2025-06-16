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
    <form id="post-add-form" action="{{ route('edit-activity-store',['id'=>$activity->id]) }}" method="POST" enctype="multipart/form-data">
     @csrf
     <div class="row mb-3">
         <div class="col-md-6">
        <label class="form-label">Post Date </label>
        <input type="text" class="form-control" name="post_date" value="{{ $activity->post_date }}" readonly>
      </div>
      
       <div class="col-md-6">
        <label class="form-label">Timeline Post  <span>*</span></label>
        <input type="file" class="form-control" name="timeline_post" >
         @if($activity->timeline_post)
        <small class="form-text text-muted mt-2">
            Already uploaded: 
            <a href="{{ asset('storage/uploads/'. $activity->timeline_post) }}" target="_blank">View Timeline Post</a>
        </small>
         @else
         <small class="form-text text-muted mt-2">
            No Image Uploaded!
        </small>
    @endif
      </div>
      </div>
    <div class="row mb-3">
      <div class="col-md-6">
        <label class="form-label">Title <span>*</span></label>
        <input type="text" class="form-control" name="title" value="{{ $activity->title }}">
      </div>
      <div class="col-md-6">
        <label class="form-label">Description <span>*</span></label>
        <input type="text" class="form-control" name="description" value="{{ $activity->description }}" required>

      </div>
    </div>

    <div class="row mb-3">
      <div class="col-md-6">
        <label class="form-label">Venue <span>*</span></label>
        <input type="text" class="form-control" name="venue" value="{{ $activity->venue }}" required>

      </div>
      <div class="col-md-6">
        <label class="form-label">Start Event <span>*</span></label>
        <input type="datetime-local" class="form-control" name="event_start" value="{{ $activity->event_start }}" >

      </div>
    
    </div>
    <div class="row mb-3">

      <div class="col-md-6">
        <label class="form-label">End Event <span>*</span></label>
        <input type="datetime-local" class="form-control" name="event_end" value="{{ $activity->event_end }}" >

      </div>
    </div>

    <button type="submit" class="btn btn-primary mt-4" style="width: 100%; cursor: pointer;">Update</button>
  </form>
</div>





@endsection
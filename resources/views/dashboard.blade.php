@extends('layouts.admin-layout')

@section('title', 'Home - Admin Dashboard')

@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
   /* .tall-box {
    min-height: 150px;
  } */
.card {
  border-left: 5px solid #0d6efd;
  transition: transform 0.2s;
}
.card:hover {
  transform: scale(1.02);
}
a{
  text-decoration: none;
  color:black;
}
</style>


<div class="container mt-4">
  <div class="row">
    <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
      <div class="card shadow rounded h-100 tall-box">
        <a href="{{ route('varified-user.index') }}">
        <div class="card-body">
          <h5 class="card-title d-flex justify-content-between align-items-center">Verified Members
            <img src="{{ asset('images/verified.png') }}" alt="View" style="height:40px;">  
          </h5>
            <h6 class="text-primary">Total: {{ $verifiedCount }}</h6>
          <p class="card-text">This is a responsive box number 1.</p>
        </div>
        </a>
      </div>
    </div>
     <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
      <div class="card shadow rounded h-100 tall-box">
        <a href="{{ route('unvarified-user.index') }}">
        <div class="card-body">
          <h5 class="card-title d-flex justify-content-between align-items-center">Unverified Members
            <img src="{{ asset('images/unverified.png') }}" alt="View" style="height:40px;">  
          </h5>
            <h6 class="text-primary">Total: {{ $unverifiedCount }}</h6>
          <p class="card-text">This is a responsive box number 2  .</p>
        </div>
        </a>
      </div>
    </div>

     <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
      <div class="card shadow rounded h-100 tall-box">
        <a href="{{ route('donation') }}">
        <div class="card-body ">
          <h5 class="card-title d-flex justify-content-between align-items-center">Donations
            <img src="{{ asset('images/donation.png') }}" alt="View" style="height:40px;">  
          </h5>
            <h6 class="text-primary">Total: {{ $donationCount }}</h6>
          <p class="card-text">This is a responsive box number 3.</p>
        </div>
        </a>
      </div>
    </div>

     <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
      <div class="card shadow rounded h-100 tall-box">
        <a href="{{ route('testimonials') }}">
        <div class="card-body">
          <h5 class="card-title d-flex justify-content-between align-items-center">Testimonials
            <img src="{{ asset('images/testimonial.png') }}" alt="View" style="height:40px;">  
          </h5>
            <h6 class="text-primary">Total: {{ $testimonialCount }}</h6>
          <p class="card-text">This is a responsive box number 4.</p>
        </div>
        </a>
      </div>
    </div>

    
     <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
      <div class="card shadow rounded h-100 tall-box">
        <a href="{{ route('contact-list') }}">
        <div class="card-body">
          <h5 class="card-title d-flex justify-content-between align-items-center">Contact Us
            <img src="{{ asset('images/contact.png') }}" alt="View" style="height:40px;">  
          </h5>
            <h6 class="text-primary">Total: {{ $contactList }}</h6>

          <p class="card-text">This is a responsive box number 5.</p>
        </div>
        </a>
      </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
      <div class="card shadow rounded h-100 tall-box">
        <a href="{{ route('management.index') }}">
        <div class="card-body">
          <h5 class="card-title d-flex justify-content-between align-items-center">Management Team
            <img src="{{ asset('images/team.png') }}" alt="View" style="height:40px;">  
          </h5>
            <h6 class="text-primary">Total: {{ $managementTeamCount }}</h6>
          <p class="card-text">This is a responsive box number 5.</p>
        </div>
        </a>
      </div>
    </div>

    <div class="col-md-6 col-sm-12 col-xs-12 ">

        <div class="box3">
                    <h5 style="color:gray;">Latest Activity (3)</h5><hr>
                    <h6><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp;NGO संस्था में बेहतर फंडिंग / प्रमोशन के लिए 05 आसान तरीके</h6>
          <hr>

                    <h6><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp;Give children a good education &amp; better life</h6>
          <hr>

                    <h6><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp;Collect fund for drinking water &amp; healthy food</h6>
          <hr>

                              <center><a href="timeline-post-list.php" class="btn btn-danger">View All</a></center>
        </div>
      </div>

    <!-- Repeat for Box 2 to Box 9 -->
  </div>
</div>




@endsection




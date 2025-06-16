@extends('layouts.manager-layout')

@section('title', 'Home - Manager Dashboard')

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
        <a href="{{ route('managerVerifiedUser.index') }}">
        <div class="card-body">
          <h5 class="card-title d-flex justify-content-between align-items-center">Varified Members
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
        <a href="{{ route('managerUnverifiedUser.index') }}">
        <div class="card-body">
          <h5 class="card-title d-flex justify-content-between align-items-center">Unvarified Members
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
        <a href="{{ route('managerDoner') }}">
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
        <a href="{{ route('managerpending-user.index') }}">
        <div class="card-body ">
          <h5 class="card-title d-flex justify-content-between align-items-center">Pending User
            <img src="{{ asset('images/donation.png') }}" alt="View" style="height:40px;">  
          </h5>
            <h6 class="text-primary">Total: {{ $pendingUser }}</h6>
          <p class="card-text">This is a responsive box number 3.</p>
        </div>
        </a>
      </div>
    </div>
   

    <!-- Repeat for Box 2 to Box 9 -->
  </div>
</div>




@endsection





@extends('layouts.header')

@section('title', 'Latest Events')

@section('content')
<style>
    .fixed-image-size {
        width: 400px;
        height: 300px;
        object-fit: cover;
        object-position: center;
        border-radius: 8px; /* optional */
    }
</style>
<div class="container my-5">
    <h2 class="text-center mb-4" style="margin-top: 150px; font-weight: 800; color:rgba(0, 146, 69, 1)" >Our Projects</h2>

    @foreach ($projects as $project)
        <div class="row motive_main_div shadow overflow-hidden mb-4" style="border-radius: 30px;">
            <!-- Image Section -->
            <div class="col-md-5 p-0">
                <img src="{{ asset('storage/uploads/' . $project->project_image) }}" alt="project Image" class="fixed-image-size  object-fit-cover">
            </div>

            <!-- Text Content Section -->
          <!-- Text Content Section -->
<div class="col-md-7 p-4 d-flex flex-column justify-content-between">
    <div>
        <!-- <div class="detail d-flex justify-content-between align-items-center text-secondary mb-2"> -->
        <!-- </div> -->
        <h2 class="mb-3">Title: {{ $project->title }}</h2>
        <div class="description mb-3"><b>Description:</b>{{ $project->description }}</div>
    </div>
</div>

        </div>
    @endforeach
</div>

@endsection

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
    <h2 class="text-center mb-4" style="margin-top: 150px; font-weight: 800; color:rgba(0, 146, 69, 1)" >Upcoming Events</h2>

    @foreach ($events as $event)
        <div class="row motive_main_div shadow overflow-hidden mb-4" style="border-radius: 30px;">
            <!-- Image Section -->
            <div class="col-md-5 p-0">
                <img src="{{ asset('storage/uploads/' . $event->event_image) }}" alt="Event Image" class="fixed-image-size  object-fit-cover">
            </div>

            <!-- Text Content Section -->
          <!-- Text Content Section -->
<div class="col-md-7 p-4 d-flex flex-column justify-content-between">
    <div>
        <div class="detail d-flex justify-content-between align-items-center text-secondary mb-2">
            <p class="mb-0"><b>Location:</b> {{ $event->venue }}</p>
            <p class="mb-0"><b>Date:</b> {{ \Carbon\Carbon::parse($event->event_date)->format('F d, Y \a\t h:i A') }}</p>
        </div>
        <h2 class="mb-3">Title: {{ $event->title }}</h2>
        <div class="description mb-3"><b>Description:</b>{{ $event->description }}</div>
    </div>

{{-- wherever you list the events --}}
<a href="{{ route('book-seat-website-page', ['id' => $event->id]) }}"
   class="btn  mt-3" style=" background: linear-gradient(122deg, rgba(0, 146, 69, 1) 0%, rgba(135, 190, 65, 1) 100%);">
    Book Seat
</a>

</div>

        </div>
    @endforeach
</div>

@endsection

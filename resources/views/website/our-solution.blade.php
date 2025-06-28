@extends('layouts.header')

@section('title', 'Latest Events')

@section('content')

<style>
    .solution-container {
        margin-top: 140px;
    }

    .solution-card {
        background-color: #fff;
        border-radius: 20px;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.08);
        overflow: hidden;
        margin-bottom: 30px;
        transition: transform 0.3s ease;
    }

    .solution-card:hover {
        transform: translateY(-5px);
    }

    .solution-img {
        width: 100%;
        height: 600px;
        object-fit: contain;
    }

    .solution-body {
        padding: 20px;
    }

    .solution-date {
        font-size: 0.9rem;
        color: #888;
        text-align: right;
    }

    .solution-title {
        font-size: 1.5rem;
        font-weight: 700;
        color: #009245;
        margin: 10px 0;
    }

    .solution-desc {
        font-size: 1rem;
        color: #444;
    }
</style>

<div class="container solution-container">
    <h2 class="text-center fw-bold mb-5" style="color: rgba(0, 146, 69, 1)">Latest Solutions</h2>

    @forelse ($complains as $event)
        <div class="solution-card">
            <img src="{{ asset('storage/uploads/' . $event->solution_file) }}" alt="Solution Image" class="solution-img">
            <div class="solution-body">
                <p class="solution-date">Solved on {{ \Carbon\Carbon::parse($event->completion_date)->format('F d, Y') }}</p>
                <h4 class="solution-title">{{ $event->solution_title }}</h4>
                <p class="solution-desc">{{ $event->solution_description }}</p>
            </div>
        </div>
    @empty
        <div class="text-center p-5 text-muted">
            <h4>No solutions found 😕</h4>
        </div>
    @endforelse
</div>


@endsection

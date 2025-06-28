@extends('layouts.header')

@section('title', 'Header List')

@section('content')

<style>
.about-header {
    margin-top: 150px;
    text-align: center;
    font-size: 2.5rem;
    font-weight: bold;
    color: #2c3e50;
}

.about-paragraph {
    max-width: 900px;
    margin: 40px auto;
    font-size: 1.1rem;
    line-height: 1.8;
    color: #444;
    padding: 0 15px;
}

.about-section {
    padding: 60px 0;
    background-color: #f9f9f9;
}

.about-section .image img {
    width: 100%;
    height: auto;
    border-radius: 12px;
    box-shadow: 0 4px 10px rgba(0,0,0,0.1);
}

.about-section .text h2 {
    font-size: 2rem;
    font-weight: 700;
    color: #333;
    margin-bottom: 20px;
}

.about-section .text p {
    font-size: 1.1rem;
    color: #555;
    line-height: 1.7;
}

.highlight-heading {
    font-weight: bold;
    font-size: 1.3rem;
    display: inline-block;
    margin-top: 1rem;
    color: #333;
}


</style>

<div class="about-header" style="margin-top: 150px; color:rgba(0, 146, 69, 1)">
    About Us
</div>

<div class="about-paragraph">
    {!! nl2br(
        str_replace(
            ['Our Values', 'Our Impact', 'Join Us'],
            [
                '<span class="highlight-heading">Our Values</span>',
                '<span class="highlight-heading">Our Impact</span>',
                '<span class="highlight-heading">Join Us</span>'
            ],
            e($companyProfile->aboutus)
        )
    ) !!}
</div>


<div class="about-section">
    <div class="container">
        <div class="row align-items-center gy-4">
            <div class="col-md-6">
               <div class="image">
                <img src="{{ asset('/storage/uploads/' . $aboutUsPost->image) }}" alt="About Image"
                     style="width: 500px; height: 500px; object-fit: cover; border-radius: 12px;">
                </div>

            </div>
            <div class="col-md-6">
                <div class="text">
                    <h2>{{ $aboutUsPost->title }}</h2>
                    <p>{{ $aboutUsPost->description }}</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

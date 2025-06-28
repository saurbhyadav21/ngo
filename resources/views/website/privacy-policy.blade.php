@extends('layouts.header')

@section('title', 'Complain / Suggestion')

@section('content')

<style>
    .about-header {
        text-align: center;
        font-size: 32px;
        font-weight: bold;
        margin-top: 150px;
        margin-bottom: 30px;
        color: rgba(0, 146, 69, 1);
    }

    .about-paragraph {
        padding: 0 20px;
        max-width: 900px;
        margin: 0 auto 80px auto;
        font-size: 16px;
        line-height: 1.8;
        color: #333;
    }

    .highlight-heading {
        display: block;
        margin-top: 30px;
        font-weight: bold;
        font-size: 20px;
        color: #009245;
    }
</style>

<div class="about-header">
    Privacy Policy
</div>

<div class="about-paragraph">
    {!! nl2br(
        $companyProfile->privacy_policy
    ) !!}
</div>

@endsection

@extends('layouts.header')

@section('title', 'Header List')

@section('content')

<style>
.card img {
    object-fit: cover;
    border-radius: 12px;
}
</style>

<div class="container my-5">
    <!-- Heading -->
    <div class="text-center mb-4">
        <h2 class="fw-bold" style="margin-top: 140px; color:rgba(0, 146, 69, 1)">Management Team</h2>
    </div>

<!-- Search Field -->
<div class="row justify-content-center mb-4">
    <div class="col-md-6">
       <input type="text" id="search" class="form-control" placeholder="Search by name, position, mobile...">

    </div>
</div>

<div class="row row-cols-1 row-cols-md-3 g-4 card_main_div">
    @include('partials.management-cards', ['managementTeams' => $managementTeams])
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function () {
    let debounceTimer;
    const delay = 300;

    $('#search').on('input', function () {
        clearTimeout(debounceTimer);
        const searchValue = $(this).val();

        debounceTimer = setTimeout(() => {
            $.ajax({
                url: '{{ route("management.search") }}',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    search: searchValue
                },
                success: function (res) {
                    $('.card_main_div').html(res.html);
                },
                error: function () {
                    alert('Error loading management team');
                }
            });
        }, delay);
    });
});
</script>

    

@endsection

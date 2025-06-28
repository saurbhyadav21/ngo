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
        <h2 class="fw-bold" style="margin-top: 140px; color:rgba(0, 146, 69, 1)">Our Certifications</h2>
    </div>



<!-- achievement Cards -->
<div class="row row-cols-1 row-cols-md-3 g-4 card_main_div">
<!-- Card Loop -->
@forelse ($certificates as $certificate)
<div class="col">
    <!-- <div class="card h-100 shadow rounded-4 p-3"> -->
        <!-- <div class="text-center"> -->
            <img src="{{ asset('storage/uploads/' . $certificate->certificate_image) }}"
                 alt="{{ $certificate->title }}"
                 width="260" height="260"
                 class="mx-auto d-block rounded mb-3 image-click  rounded-4 "
                 data-bs-toggle="modal"
                 data-bs-target="#imageModal"
                 data-image="{{ asset('storage/uploads/' . $certificate->certificate_image) }}"
                 style="cursor: pointer; object-fit: cover; box-shadow: 0 10px 25px rgba(0,0,0,0.25);">
        <!-- </div> -->
        <h5 class="text-center mb-2">{{ ucwords(strtolower($certificate->title)) }}</h5>
    <!-- </div> -->
</div>
@empty
<p class="text-center py-4 col-12">No Certificate found 😕</p>
@endforelse


</div>

<!-- Image Preview Modal -->
<div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content p-3">
      <div class="modal-body text-center">
        <img src="" id="modalImage" class="img-fluid rounded" style="max-height: 80vh;" alt="Preview">
      </div>
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).on('click', '.image-click', function () {
    const imageSrc = $(this).data('image');
    $('#modalImage').attr('src', imageSrc);
});
</script>

    

@endsection

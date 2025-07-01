{{-- resources/views/admin-dashboard.blade.php --}}
@extends('layouts.admin-layout')

@section('title', 'Home - Admin Dashboard')

@section('content')

@if($type === 'varified')
   <div class="container" style="padding: 20px;">
    <h1 style="padding: 20px;">User Details</h1>
    <table class="table table-bordered">
       
        <tr>
            <th>Name</th>
            <td>{{ $data->name }}</td>
        </tr>
        <tr>
            <th>Gender</th>
            <td>{{ $data->gender }}</td>
        </tr>
         <tr>
            <th>Date Of Birth</th>
            <td>{{ $data->dob }}</td>
        </tr>
         <tr>
            <th>Relation</th>
            <td>{{ $data->relation_type }}</td>
        </tr>
         <tr>
            <th>Relation Name</th>
            <td>{{ $data->relation_name }}</td>
        </tr>
         <tr>
            <th>Profession</th>
            <td>{{ $data->profession }}</td>
        </tr>
         <tr>
    <th>Profile Image</th>
    <td>
      @if($data->profile_image)
    <img src="{{ asset('storage/uploads/' . $data->profile_image) }}"
     alt="Profile Image"
     width="100"
     class="img-thumbnail"
     style="cursor: pointer;"
     onclick="showImage('{{ asset('storage/uploads/' . $data->profile_image) }}')">

@else
    No Image Uploaded
@endif

    </td>
</tr>
        <tr>
            <th>ID Type</th>
            <td>
         @if($data->id_type)
        {{ $data->id_type }}
    @else
        No ID Type Defined
    @endif
    </td>
        </tr>
       <tr> 
    <th>ID Image</th>
    <td>
        @if($data->id_image)
             <img src="{{ asset('storage/uploads/' . $data->id_image) }}"
     alt="Profile Image"
     width="100"
     class="img-thumbnail"
     style="cursor: pointer;"
     onclick="showImage('{{ asset('storage/uploads/' . $data->id_image) }}')">
        @else
            No Image Uploaded
        @endif
    </td>
</tr>

<tr>
    <th>Other Document</th>
    <td>
        @if($data->other_document)
              <img src="{{ asset('storage/uploads/' . $data->other_document) }}"
     alt="Profile Image"
     width="100"
     class="img-thumbnail"
     style="cursor: pointer;"
     onclick="showImage('{{ asset('storage/uploads/' . $data->other_document) }}')">
        @else
            No Image Uploaded
        @endif
    </td>
</tr>
         <tr>
             <th>Blood Group</th>
            <td>{{ $data->blood_group }}</td>
        </tr>
         <tr>
            <th>State</th>
            <td>{{ $data->state }}</td>
        </tr>
         <tr>
            <th>District</th>
            <td>{{ $data->district }}</td>
        </tr>
         <tr>
            <th>Mobile Number</th>
            <td>{{ $data->mobile_number }}</td>
        </tr>
         <tr>
            <th>Aadhar Number</th>
            <td>{{ $data->aadhar_number }}</td>
        </tr>
         <tr>
            <th>Address</th>
            <td>{{ $data->address }}</td>
        </tr>
        <tr>
            <th>Pincode</th>
            <td>{{ $data->pin_code }}</td>
        </tr>    
        <tr>
            <th>Email</th>
            <td>{{ $data->email }}</td>
        </tr>
        <tr>
            <th>Register By</th>
            <td>{{ $data->registered_by }}</td>
        </tr>
        <tr>
            <th>Coordinator ID</th>
            <td>{{ $data->coordinator_id }}</td>
        </tr>
         <tr>
            <th>Status</th>
            <!-- <td id="statusText">{{ $data->status == 1 ? 'Verified' : 'Unverified' }}</td> -->
             <td id="statusText">
    @if ($data->status == 1)
        <span class="badge bg-success">Verified</span>
    @elseif ($data->status == 0)
        <span class="badge bg-danger">Unverified</span>
    @elseif ($data->status == 2)
        <span class="badge bg-warning text-dark">Pending</span>
    @else
        <span class="badge bg-secondary">Unknown</span>
    @endif
</td>


        </tr>
        

    </table>
    <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
</div>
 @elseif($type === 'unvarified')
<div class="container py-4">
    <h2 class="mb-4">unvarified Details</h2>
    <table class="table table-bordered">
         <tr>
            <th>Name</th>
            <td>{{ $data->name }}</td>
        </tr>
        <tr>
            <th>Gender</th>
            <td>{{ $data->gender }}</td>
        </tr>
         <tr>
            <th>Date Of Birth</th>
            <td>{{ $data->dob }}</td>
        </tr>
         <tr>
            <th>Relation</th>
            <td>{{ $data->relation_type }}</td>
        </tr>
           <tr>
            <th>Relation Name</th>
            <td>{{ $data->relation_name }}</td>
        </tr>
         <tr>
            <th>Profession</th>
            <td>{{ $data->profession }}</td>
        </tr>
         <tr>
    <th>Profile Image</th>
    <td>
      @if($data->profile_image)
    <img src="{{ asset('storage/uploads/' . $data->profile_image) }}"
     alt="Profile Image"
     width="100"
     class="img-thumbnail"
     style="cursor: pointer;"
     onclick="showImage('{{ asset('storage/uploads/' . $data->profile_image) }}')">
@else
    No Image Uploaded
@endif

    </td>
</tr>
        <tr>
            <th>ID Type</th>
            <td>
         @if($data->id_type)
        {{ $data->id_type }}
    @else
        No ID Type Defined
    @endif
    </td>
        </tr>
       <tr> 
    <th>ID Image</th>
    <td>
        @if($data->id_image)
                  <img src="{{ asset('storage/uploads/' . $data->id_image) }}"
     alt="Profile Image"
     width="100"
     class="img-thumbnail"
     style="cursor: pointer;"
     onclick="showImage('{{ asset('storage/uploads/' . $data->id_image) }}')">
        @else
            No Image Uploaded
        @endif
    </td>
</tr>

<tr>
    <th>Other Document</th>
    <td>
        @if($data->other_document)
        <img src="{{ asset('storage/uploads/' . $data->other_document) }}"
     alt="Profile Image"
     width="100"
     class="img-thumbnail"
     style="cursor: pointer;"
     onclick="showImage('{{ asset('storage/uploads/' . $data->other_document) }}')">
        @else
            No Image Uploaded
        @endif
    </td>
</tr>
         <tr>
             <th>Blood Group</th>
            <td>{{ $data->blood_group }}</td>
        </tr>
         <tr>
            <th>State</th>
            <td>{{ $data->state }}</td>
        </tr>
         <tr>
            <th>District</th>
            <td>{{ $data->district }}</td>
        </tr>
         <tr>
            <th>Mobile Number</th>
            <td>{{ $data->mobile_number }}</td>
        </tr>
         <tr>
            <th>Aadhar Number</th>
            <td>{{ $data->aadhar_number }}</td>
        </tr>
         <tr>
            <th>Address</th>
            <td>{{ $data->address }}</td>
        </tr>
        <tr>
            <th>Pincode</th>
            <td>{{ $data->pin_code }}</td>
        </tr>    
        <tr>
            <th>Email</th>
            <td>{{ $data->email }}</td>
        </tr>
        <tr>
            <th>Register By</th>
            <td>{{ $data->registered_by }}</td>
        </tr>
        <tr>
            <th>Coordinator ID</th>
            <td>{{ $data->coordinator_id }}</td>
        </tr>
          <tr>
            <th>Status</th>
            <!-- <td id="statusText">{{ $data->status == 1 ? 'Verified' : 'Unverified' }}</td> -->
             <td id="statusText">
    @if ($data->status == 1)
        <span class="badge bg-success">Verified</span>
    @elseif ($data->status == 0)
        <span class="badge bg-danger">Unverified</span>
    @elseif ($data->status == 2)
        <span class="badge bg-warning text-dark">Pending</span>
    @else
        <span class="badge bg-secondary">Unknown</span>
    @endif
</td>


        </tr>
    </table>
  
    <button class="btn btn-success" id="verifyBtn" data-id="{{ $data->id }}" {{ $data->status == 1 ? 'disabled' : '' }}>Verify</button>
<button class="btn btn-danger" id="unverifyBtn" data-id="{{ $data->id }}" {{ $data->status == 0 ? 'disabled' : '' }}>Unverify</button>



    <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
</div>
 @elseif($type === 'pending')
<div class="container py-4">
    <h2 class="mb-4">Pending Users Details</h2>
    <table class="table table-bordered">
         <tr>
            <th>Name</th>
            <td>{{ $data->name }}</td>
        </tr>
        <tr>
            <th>Gender</th>
            <td>{{ $data->gender }}</td>
        </tr>
         <tr>
            <th>Date Of Birth</th>
            <td>{{ $data->dob }}</td>
        </tr>
         <tr>
            <th>Relation</th>
            <td>{{ $data->relation_type }}</td>
        </tr>
           <tr>
            <th>Relation Name</th>
            <td>{{ $data->relation_name }}</td>
        </tr>
         <tr>
            <th>Profession</th>
            <td>{{ $data->profession }}</td>
        </tr>
        <tr>
    <th>Profile Image</th>
    <td>
      @if($data->profile_image)
     <img src="{{ asset('storage/uploads/' . $data->profile_image) }}"
     alt="Profile Image"
     width="100"
     class="img-thumbnail"
     style="cursor: pointer;"
     onclick="showImage('{{ asset('storage/uploads/' . $data->profile_image) }}')">
@else
    No Image Uploaded
@endif

    </td>
</tr>
        <tr>
            <th>ID Type</th>
            <td>
         @if($data->id_type)
        {{ $data->id_type }}
    @else
        No ID Type Defined
    @endif
    </td>
        </tr>
       <tr> 
    <th>ID Image</th>
    <td>
        @if($data->id_image)
    <img src="{{ asset('storage/uploads/' . $data->id_image) }}"
     alt="Profile Image"
     width="100"
     class="img-thumbnail"
     style="cursor: pointer;"
     onclick="showImage('{{ asset('storage/uploads/' . $data->id_image) }}')">
        @else
            No Image Uploaded
        @endif
    </td>
</tr>

<tr>
    <th>Other Document</th>
    <td>
        @if($data->other_document)
             <img src="{{ asset('storage/uploads/' . $data->other_document) }}"
     alt="Profile Image"
     width="100"
     class="img-thumbnail"
     style="cursor: pointer;"
     onclick="showImage('{{ asset('storage/uploads/' . $data->other_document) }}')">
        @else
            No Image Uploaded
        @endif
    </td>
</tr>
         <tr>
             <th>Blood Group</th>
            <td>{{ $data->blood_group }}</td>
        </tr>
         <tr>
            <th>State</th>
            <td>{{ $data->state }}</td>
        </tr>
         <tr>
            <th>District</th>
            <td>{{ $data->district }}</td>
        </tr>
         <tr>
            <th>Mobile Number</th>
            <td>{{ $data->mobile_number }}</td>
        </tr>
         <tr>
            <th>Aadhar Number</th>
            <td>{{ $data->aadhar_number }}</td>
        </tr>
         <tr>
            <th>Address</th>
            <td>{{ $data->address }}</td>
        </tr>
        <tr>
            <th>Pincode</th>
            <td>{{ $data->pin_code }}</td>
        </tr>    
        <tr>
            <th>Email</th>
            <td>{{ $data->email }}</td>
        </tr>
        <tr>
            <th>Register By</th>
            <td>{{ $data->registered_by }}</td>
        </tr>
        <tr>
            <th>Coordinator ID</th>
            <td>{{ $data->coordinator_id }}</td>
        </tr>
         <tr>
            <th>Status</th>
            <!-- <td id="statusText">{{ $data->status == 1 ? 'Verified' : 'Unverified' }}</td> -->
             <td id="statusText">
    @if ($data->status == 1)
        <span class="badge bg-success">Verified</span>
    @elseif ($data->status == 0)
        <span class="badge bg-danger">Unverified</span>
    @elseif ($data->status == 2)
        <span class="badge bg-warning text-dark">Pending</span>
    @else
        <span class="badge bg-secondary">Unknown</span>
    @endif
</td>


        </tr>
    </table>
  
    <button class="btn btn-success" id="verifyBtn" data-id="{{ $data->id }}" {{ $data->status == 1 ? 'disabled' : '' }}>Verify</button>
<button class="btn btn-danger" id="unverifyBtn" data-id="{{ $data->id }}" {{ $data->status == 0 ? 'disabled' : '' }}>Unverify</button>



    <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
</div>
@endif

<!-- Image Preview Modal -->
<div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-fullscreen">
    <div class="modal-content bg-dark">
      <div class="modal-header border-0">
        <button type="button" class="btn-close btn-close-white ms-auto" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body d-flex justify-content-center align-items-center" style="min-height: 90vh;">
        <img id="modalImage" src="" class="img-fluid" style="max-height: 90vh;" alt="Full Image">
      </div>
    </div>
  </div>
</div>




<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
  $(document).ready(function() {
    $('#verifyBtn').click(function() {
        let id = $(this).data('id');
        updateStatus(id, 1);
    });

    $('#unverifyBtn').click(function() {
        let id = $(this).data('id');
        updateStatus(id, 0);
    });

   function updateStatus(id, status) {
    $.ajax({
        url: '{{ route("user.status.update") }}',
        type: 'POST',
        data: {
            id: id,
            status: status,
            _token: '{{ csrf_token() }}'
        },
        success: function(response) {
            if (response.success) {
                $('#statusText').html(getStatusBadge(response.new_status));

                if (response.new_status == 1) {
                    $('#verifyBtn').attr('disabled', true);
                    $('#unverifyBtn').attr('disabled', false);
                    alert("User has been Verified successfully!");
                    window.location.href = response.redirect_url; // ✅ Redirect to verified list
                } else if (response.new_status == 0) {
                    $('#verifyBtn').attr('disabled', false);
                    $('#unverifyBtn').attr('disabled', true);
                    alert("User has been Unverified successfully!");
                    window.location.href = response.redirect_url; // ✅ Redirect to unverified list
                }
            } else {
                alert("Something went wrong!");
            }
        },
        error: function() {
            alert("An error occurred while updating status.");
        }
    });
}


    function getStatusBadge(status) {
        if (status == 1) {
            return '<span class="badge bg-success">Verified</span>';
        } else if (status == 0) {
            return '<span class="badge bg-danger">Unverified</span>';
        } else if (status == 2) {
            return '<span class="badge bg-warning text-dark">Pending</span>';
        } else {
            return '<span class="badge bg-secondary">Unknown</span>';
        }
    }
});


  function showImage(src) {
    const modalImage = document.getElementById('modalImage');
    modalImage.src = src;
    const imageModal = new bootstrap.Modal(document.getElementById('imageModal'));
    imageModal.show();
  }


</script>



@endsection
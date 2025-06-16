{{-- resources/views/admin-dashboard.blade.php --}}
@extends('layouts.admin-layout')

@section('title', 'Home - Admin Dashboard')

@section('content')


   <div class="container" style="padding: 20px;">
    <h1 >Donor Details</h1>
    <table class="table table-bordered">
       
        <tr>
            <th>Name</th>
            <td>{{ $doner->name }}</td>
        </tr>
       <tr>
    <th>Image</th>
    <td>
        @if($doner->image)
            <img src="{{ asset('storage/uploads/' . $doner->image) }}" alt="Doner Image" style="height: 100px; border-radius: 8px;">
        @else
            No image available
        @endif
    </td>
</tr>

         <tr>
            <th>Amount</th>
            <td>{{ $doner->amount }}</td>
        </tr>
         <tr>
            <th>Phone</th>
            <td>{{ $doner->phone }}</td>
        </tr>
         <tr>
             <th>Email</th>
            <td>{{ $doner->email }}</td>
        </tr>
         <tr>
            <th>Address</th>
            <td>{{ $doner->address }}</td>
        </tr>
         <tr>
            <th>Pancard No.</th>
            <td>{{ $doner->pancard }}</td>
        </tr>
         <tr>
            <th>Payment Receipt</th>
            <td>{{ $doner->payment_receipt }}</td>
        </tr>
        <tr>
            <th>Created At</th>
            <td>{{ $doner->created_at }}</td>
        </tr>    
<tr>
    <th>Status</th>
    <td id="statusText">
        @if ($doner->status == 1)
            <span class="badge bg-success">Verified</span>
        @elseif ($doner->status == 0)
            <span class="badge bg-danger">Unverified</span>
        @elseif ($doner->status == 2)
            <span class="badge bg-warning text-dark">Pending</span>
        @else
            <span class="badge bg-secondary">Unknown</span>
        @endif
    </td>
</tr>
</table>
<button class="btn btn-success" id="verifyBtn" data-id="{{ $doner->id }}" {{ $doner->status == 1 ? 'disabled' : '' }}>Verify</button>
<button class="btn btn-danger" id="unverifyBtn" data-id="{{ $doner->id }}" {{ $doner->status == 0 ? 'disabled' : '' }}>Unverify</button>
<a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>

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
                url: '{{ route("doner.status.update") }}',
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
                        } else if (response.new_status == 0) {
                            $('#verifyBtn').attr('disabled', false);
                            $('#unverifyBtn').attr('disabled', true);
                        }
                    }
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
</script>



@endsection
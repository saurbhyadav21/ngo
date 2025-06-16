@extends('layouts.manager-layout')

@section('title', 'Home - Manager Dashboard')

@section('content')
    <title>Laravel DataTables Demo</title>
     <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
 
    <style>
       
        /* Fix the select dropdown appearance in DataTables */
    .dataTables_length select {
    appearance: none;
    -webkit-appearance: none;
    -moz-appearance: none;
    background-image: none !important;
    padding-right: 10px; /* space for arrow */
}
.dataTables_wrapper .dataTables_filter input{
    margin-bottom: 29px;
}
table.dataTable {
    white-space: nowrap;
}
th{
    background-color: #212529;
    color: white;
}
div.dataTables_wrapper {
    
    padding: 10px;
}

    </style>
   <div style="display: flex; justify-content: space-between; align-items: center; margin: 10px;">
    <h2 style="margin: 0;">
        Donation List
    </h2>
     <div>
        <button class="btn btn-success filter-btn" data-status="1">Verified Donor</button>
        <button class="btn btn-danger filter-btn" data-status="0">Unverified Donor</button>
        <button class="btn btn-warning filter-btn" data-status="2">Pending Donor</button>
        <!-- <a href="{{ route('add-new-doner') }}" class="btn btn-primary">Add New Doner</a> -->
    </div>
    <!-- <a href="{{ route('add-new-doner') }}" class="btn btn-primary" style="padding: 6px 12px; font-size: 14px;">
        Add New Donor
    </a> -->
</div>




  <div style="overflow-x:auto;">
    <table id="users-table" class="display nowrap" style="width:100%">
        <thead>
            <tr>
                <th >#</th>
                <th>Name</th>
                
                <th>Photo</th>
                <!-- <th>Title</th> -->
                <!-- <th>Address</th>
                <th>Pincode</th> -->
                <th>Amount</th>
                <th>Mobile No.</th>
                <!-- <th>Start Event</th> -->
                <!-- <th>Mode</th> -->
                <th>Action</th>
            </tr>
        </thead>
    </table>
</div>


   <script>
$(document).ready(function () {

    var statusFilter = 2; // Default - all records

    var table = $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        scrollX: true,
        responsive: true,
        ajax: {
            url: "{{ route('get-managerDoner') }}",
            data: function (d) {
                d.status = statusFilter;
            }
        },
        columns: [
            {
                data: null,
                name: 'serial',
                orderable: false,
                searchable: false,
                render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                },
                width: "30px"
            },
            { data: 'name', name: 'name', className: 'text-center', width: "150px" },
            {
                data: 'image',
                name: 'image',
                width: "150px",
                className: 'text-center',
                render: function (data, type, full, meta) {
                    if (data) {
                        return '<img src="storage/uploads/' + data + '" style="width: 200px; height: 120px; object-fit: cover; border-radius: 8px;" />';
                    } else {
                        return 'No Image';
                    }
                }
            },
            { data: 'amount', name: 'amount', className: 'text-center', width: "90px" },
            { data: 'phone', name: 'phone', className: 'text-center', width: "130px" },
            { data: 'action', name: 'action', orderable: false, searchable: false, width: "200px", className: 'text-center' }
        ]
    });

    // Button click event for filtering
    $('.filter-btn').on('click', function () {
        statusFilter = $(this).data('status');
        table.ajax.reload();
    });

    // Delete Code (no change)
    $(document).on('click', '.delete', function() {
        var id = $(this).data("id");
        if (confirm("Are you sure you want to delete this post?")) {
            $.ajax({
                url: "/deleteDoner/" + id,
                type: "DELETE",
                data: { _token: "{{ csrf_token() }}" },
                success: function(response) {
                    alert(response.success);
                    table.ajax.reload();
                },
                error: function(xhr) {
                    alert('Error deleting post.');
                }
            });
        }
    });

});

</script>
@endsection
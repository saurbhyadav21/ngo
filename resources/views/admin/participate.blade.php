@extends('layouts.admin-layout')

@section('title', 'Home - Admin Dashboard')

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
       Participate List
    </h2>
   
</div>




  <div style="overflow-x:auto;">
    <table id="users-table" class="display nowrap" style="width:100%">
        <thead>
            <tr>
                <th >#</th>
                <th>Event ID</th>
                
                <th>Name</th>
                <th>Mobile</th>
                <th>City</th>
                <!-- <th>Address</th>
                <th>Pincode</th> -->
                <th>Confirm</th>
                <th>User ID</th>
                <th>Donation Details</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
        </thead>
    </table>
</div>


   

    <script>
    $(document).ready(function () {
        $('#users-table').DataTable({
            processing: true,
            serverSide: true,
            scrollX: false, 
            responsive: false,
            ajax: "{{ route('get-participate') }}",
           columns: [
     {
                    data: null,
                    name: 'serial',
                    orderable: false,
                    searchable: false,
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    },width: "30px"
    },
    { data: 'event_id', name: 'event_id' },
 
    { data: 'name', name: 'name' ,
    className: 'text-center'},
 
    { data: 'mobile', name: 'mobile' },
    { data: 'city', name: 'city' },
    { data: 'team_member', name: 'team_member' },
    { data: 'id_number', name: 'id_number' },
    { data: 'created_at', name: 'created_at' },
    
    { data: 'action', name: 'action', orderable: false, searchable: false ,
    className: 'text-center',}
]

        });
    });

     $(document).on('click', '.delete', function() {
    var id = $(this).data("id");

    if (confirm("Are you sure you want to delete this post?")) {
        $.ajax({
            url: "/delete-participate/" + id,
            type: "DELETE",
            data: {
                _token: "{{ csrf_token() }}"
            },
            success: function(response) {
                alert(response.success);
                $('#users-table').DataTable().ajax.reload(); // reload datatable
            },
            error: function(xhr) {
                alert('Error deleting post.');
            }
        });
    }
});


    </script>



@endsection
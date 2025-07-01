@extends('layouts.admin-layout')

@section('title', 'Home - Admin Dashboard')

@section('content')
    <!-- <title>Laravel DataTables Demo</title> -->
     <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
 
    <style>
        body { font-family: Arial, sans-serif; }
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
      Verified User List
    </h2>
    <a href="{{ route('add-member') }}" class="btn btn-success" style="padding: 6px 12px; font-size: 14px;">
        Add User
    </a>
</div>
  <div style="overflow-x:auto;">
    <table id="users-table" class="display nowrap" style="width:100%">
        <thead>
            <tr>
                <th >#</th>
                <th>Name</th>
                <!-- <th>Gender</th> -->
                <!-- <th>Date Of Birth</th> -->
                <!-- <th>Relation</th> -->
                <!-- <th>Profession</th> -->
                <!-- <th>Blood Group</th> -->
                <!-- <th>State</th> -->
                <!-- <th>District</th> -->
                <th>Mobile</th>
                <th>Aadhar Number</th>
                <!-- <th>Address</th> -->
                <!-- <th>Pincode</th> -->
                <th>Email</th>
                <!-- <th>Created At</th> -->
                <!-- <th>Profile Image</th> -->
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
            scrollX: true, 
            responsive: true,
            ajax: "{{ route('get-varified-user') }}",
           columns: [
     {
                    data: null,
                    name: 'serial',
                    orderable: false,
                    searchable: false,
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
    },
    { data: 'name', name: 'name',className: 'text-center' },
    // { data: 'gender', name: 'gender' },
    // { data: 'dob', name: 'dob' },
    // { data: 'relation', name: 'relation' },
    // { data: 'profession', name: 'profession' },
    // { data: 'blood_group', name: 'blood_group' },
    // { data: 'state', name: 'state' },
    // { data: 'district', name: 'district' },
    { data: 'mobile_number', name: 'mobile_number',className: 'text-center' },
    { data: 'aadhar_number', name: 'aadhar_number',className: 'text-center' },
    // { data: 'address', name: 'address' },
    // { data: 'pin_code', name: 'pin_code' },
    { data: 'email', name: 'email',className: 'text-center' },
    // { data: 'created_at', name: 'created_at' },
    // { data: 'profile_image', name: 'profile_image' },
    { data: 'action', name: 'action', orderable: false, searchable: false,className: 'text-center' }
]

        });
    });

     $(document).on('click', '.delete', function() {
    var id = $(this).data("id");

    if (confirm("Are you sure you want to delete this post?")) {
        $.ajax({
            url: "/user-delete/" + id,
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
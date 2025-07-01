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
       Certificate List
    </h2>
    <a href="{{ route('add-new-certificate') }}" class="btn btn-success" style="padding: 6px 12px; font-size: 14px;">
        Add New Certificate
    </a>
</div>




  <div style="overflow-x:auto;">
    <table id="users-table" class="display nowrap" style="width:100%">
        <thead>
            <tr>
                <th >#</th>
                <th>Image</th>
                
                <th>Title</th>
                <!-- <th>Title</th> -->
                <!-- <th>Address</th>
                <th>Pincode</th> -->
                <th>Position</th>
                <!-- <th>Venue</th> -->
                <th>Post Date</th>
                <!-- <th>City</th> -->
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
            ajax: "{{ route('get-certificate') }}",
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
 
    {
    data: 'certificate_image',
    name: 'certificate_image',
    
    width: 280,
    className: 'text-center',
    render: function(data, type, full, meta) {
        if (data) {
            return '<img src="storage/uploads/' + data + '" style="width: 250px; height: 150px; object-fit: cover; border-radius: 8px;" />';
        } else {
            return 'No Image';
        }
    }
},
    { data: 'title', name: 'title' ,
    className: 'text-center', width:200},
    
   {
  data: 'position',
  name: 'position',
    className: 'text-center',
},
    // { data: 'venue', name: 'venue' },
    // { data: 'event_start', name: 'event_start' },
    
    { data: 'created_at', name: 'created_at',
    className: 'text-center',
      width:150 },
    { data: 'action', name: 'action', orderable: false, searchable: false ,width: "150px",
    className: 'text-center',}
]

        });
    });

   $(document).on('click', '.delete', function () {
    var id = $(this).data("id");

    if (confirm("Are you sure you want to delete this certificate?")) {
        // Build the URL from Laravel’s named route (placeholder __ID__)
        var routeTemplate = "{{ route('deleteCertificate', ['id' => '__ID__']) }}";
        var deleteUrl     = routeTemplate.replace('__ID__', id);

        $.ajax({
            url:  deleteUrl,
            type: "POST",                 // POST + method spoofing
            data: {
                _token: "{{ csrf_token() }}",
                _method: "DELETE"
            },
            success: function (response) {
                alert(response.success || "Certificate deleted successfully.");
                $('#users-table').DataTable().ajax.reload(); // reload DataTable
            },
            error: function (xhr) {
                console.error(xhr.responseText);
                alert("Error deleting certificate.");
            }
        });
    }
});


    </script>


@endsection
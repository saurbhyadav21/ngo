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
                <th>Team Member</th>
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
    { data: 'upcoming_event_id', name: 'upcoming_event_id',width: "30px" },
 
    { data: 'name', name: 'name' ,
    className: 'text-center'},
 
    { data: 'mobile', name: 'mobile',
    className: 'text-center' },
    { data: 'city', name: 'city',
    className: 'text-center' },
    { data: 'team_member', name: 'team_member',
    className: 'text-center' },
    { data: 'id_number', name: 'id_number',
    className: 'text-center' },
    { data: 'want_to_donate', name: 'want_to_donate',
    className: 'text-center',
    render: function(data, type, row) {
    return `<button class="btn btn-sm btn-info view-want_to_donate w-100" data-want_to_donate="${data.replace(/"/g, '&quot;')}">View</button>`;
  }
},
    { data: 'created_at', name: 'created_at',
    className: 'text-center' },
    
    { data: 'action', name: 'action', orderable: false, searchable: false ,
    className: 'text-center',}
]

        });
    });

$(document).on('click', '.delete', function () {
    const id = $(this).data('id');

    if (!confirm("Are you sure you want to delete this participation?")) return;

    // Use Laravel route with ID placeholder
    const routeTemplate = "{{ route('delete-participate', ['id' => '__ID__']) }}";
    const deleteUrl     = routeTemplate.replace('__ID__', id);

    $.ajax({
        url: deleteUrl,
        type: 'POST',
        data: {
            _token: '{{ csrf_token() }}',
            _method: 'DELETE'
        },
        success: function (response) {
            alert(response.success || 'Deleted successfully.');
            $('#users-table').DataTable().ajax.reload(); // refresh the table
        },
        error: function (xhr) {
            console.error(xhr.responseText);
            alert('Error deleting post.');
        }
    });
});

  $(document).on('click', '.view-want_to_donate', function() {
  var message = $(this).data('want_to_donate');
  $('#fullMessageContent').html(message);
  $('#messageModal').modal('show');
});

    



    </script>


<div class="modal fade" id="messageModal" tabindex="-1" aria-labelledby="messageModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Full Message</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="fullMessageContent">
        <!-- Message will appear here -->
      </div>
    </div>
  </div>
</div>
@endsection
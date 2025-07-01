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
        All Activity
    </h2>
    <a href="{{ route('add-activity') }}" class="btn btn-success" style="padding: 6px 12px; font-size: 14px;">
        Add New Activity
    </a>
</div>




  <div style="overflow-x:auto;">
    <table id="users-table" class="display nowrap" style="width:100%">
        <thead>
            <tr>
                <th >#</th>
                <th>Post Date</th>
                
                <th>Timeline Post</th>
                <th>Title</th>
                <!-- <th>Address</th>
                <th>Pincode</th> -->
                <th>Description</th>
                <th>Venue</th>
                <th>Start Event</th>
                <th>Updated At</th>
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
            ajax: "{{ route('get-activity') }}",
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
    { data: 'post_date', name: 'post_date' ,
    className: 'text-center'},
 
    {
    data: 'timeline_post',
    name: 'timeline_post',
     width: "120px",
    className: 'text-center',
    render: function(data, type, full, meta) {
        if (data) {
            return '<img src="storage/uploads/' + data + '" style="width: 200px; height: 100px; object-fit: cover; border-radius: 8px;"  />';
        } else {
            return 'No Image';
        }
    }
},
    { data: 'title', name: 'title' ,
    className: 'text-center'},
    
      {
  data: 'description',
  name: 'description',
     width: "80px",
         className: 'text-center',

  render: function(data, type, row) {
    return `<button class="btn btn-sm btn-info view-description w-100" data-description="${data.replace(/"/g, '&quot;')}">View</button>`;
  }
},
    { data: 'venue', name: 'venue' ,
         className: 'text-center'},
    { data: 'event_start', name: 'event_start',
         className: 'text-center' },
    { data: 'updated_at', name: 'updated_at',
         className: 'text-center' },
    { data: 'action', name: 'action', orderable: false, searchable: false ,width: "150px",
    className: 'text-center'}
]

        });
    });
$(document).on('click', '.delete', function () {
    const id = $(this).data('id');

    if (!confirm('Are you sure you want to delete this activity?')) {
        return;
    }

    // Build URL from the named route:
    const template = "{{ route('deleteActivity.delete', ['id' => '__ID__']) }}";
    const deleteUrl = template.replace('__ID__', id);

    $.ajax({
        url:   deleteUrl,
        type:  'POST',              // use POST + _method spoofing
        data: {
            _token:  "{{ csrf_token() }}",
            _method: 'DELETE'       // Laravel will treat it as DELETE
        },
        success: function (resp) {
            alert(resp.success || 'Deleted!');
            $('#users-table').DataTable().ajax.reload();   // refresh table
        },
        error: function (xhr) {
            console.error(xhr.responseText);
            alert('Error deleting activity.');
        }
    });
});
   $(document).on('click', '.view-description', function() {
  var message = $(this).data('description');
  $('#fullMessageContent').html(message);
  $('#messageModal').modal('show');
});

    </script>

    <!-- Message Modal -->
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
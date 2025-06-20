@extends('layouts.admin-layout')

@section('title', 'Home - Admin Dashboard')

@section('content')
    <title>Laravel DataTables Demo</title>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
 
    <style>
        .dataTables_length select {
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            background-image: none !important;
            padding-right: 10px;
        }
        .dataTables_wrapper .dataTables_filter input {
            margin-bottom: 29px;
        }
        table.dataTable {
            white-space: nowrap;
        }
        th {
            background-color: #212529;
            color: white;
        }
        div.dataTables_wrapper {
            padding: 10px;
        }
    </style>

    <div id="editUserSection" class="container mt-4" style="display:none; animation: slideDown 0.5s ease;">
        <h5 class="text-center">Edit Complaint</h5>
       <form id="inlineEditForm" >
    <input type="hidden" name="id" id="edit_id">
    <div class="row">
        <div class="col-md-6">
            <label>Name:</label>
            <input type="text" class="form-control" name="name" id="edit_name" required>
        </div>
        <div class="col-md-6">
            <label>Phone:</label>
            <input type="text" class="form-control" name="phone" id="edit_phone" required>
        </div>
        <div class="col-md-6">
            <label>City:</label>
            <input type="text" class="form-control" name="city" id="edit_city" required>
        </div>
        <div class="col-md-6">
            <label>Video Url:</label>
            <input type="text" class="form-control" name="video_url" id="edit_video_url" required>
        </div>
        <div class="col-md-12 mt-2">
            <label>Message:</label>
            <textarea class="form-control" name="message" id="edit_message" rows="3"></textarea>    
        </div>
        <div class="col-md-12 mt-2">
            <label>Description:</label>
            <textarea class="form-control" name="description" id="edit_description" rows="3"></textarea>
        </div>
       <!-- Upload Document 1 -->
<div class="col-md-6 mt-2">
    <label>Upload Document 1:</label>
    <input type="file" class="form-control" name="upload_document_1" id="edit_upload_document_1">
    <a href="#" target="_blank" id="view_document_1" style="display:block; margin-top:5px;">View Document 1</a>
</div>

<!-- Upload Document 2 -->
<div class="col-md-6 mt-2">
    <label>Upload Document 2:</label>
    <input type="file" class="form-control" name="upload_document_2" id="edit_upload_document_2">
    <a href="#" target="_blank" id="view_document_2" style="display:block; margin-top:5px;">View Document 2</a>
</div>


        
    <div class="col-md-12 mt-4">
    <h1>--Solution--</h1>
    <label>Status:</label>
    <select class="form-control" name="status" id="edit_status" required>
        <option value="0">Pending</option>
        <option value="1">Review</option>
        <option value="2">Complete</option>
    </select>
</div>

<!-- Hidden Fields for Complete -->
<div id="completeFields" style="display:none;">
    <div class="row">
    <div class="col-md-6 mt-2">
        <label>Completion Date:</label>
        <input type="date" class="form-control" name="completion_date" id="completion_date">
    </div>
    <div class="col-md-6 mt-2">
        <label>Solution Title:</label>
        <input type="text" class="form-control" name="solution_title" id="solution_title">
    </div>
    <div class="col-md-12 mt-2">
        <label>Solution File:</label>
        <input type="file" class="form-control" name="solution_file" id="solution_file">
    <a href="#" target="_blank" id="view_document_3" style="display:block; margin-top:5px;">View Solution File</a>

    </div>
    
    <div class="col-md-12 mt-2">
        <label>Solution Description:</label>
        <textarea class="form-control" name="solution_description" id="solution_description" rows="3"></textarea>
</div>
    </div>
</div>
</div>


    <div class="text-center mt-3">
        <button type="submit" class="btn btn-success">Update</button>
        <button type="button" id="cancelEditBtn" class="btn btn-secondary">Cancel</button>
    </div>
</form>

    </div>

    <div style="display: flex; justify-content: space-between; align-items: center; margin: 10px;">
        <h2 style="margin: 0;">Complain/Solution</h2>
    </div>
    <div style="overflow-x:auto;">
        <table id="users-table" class="display nowrap" style="width:100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Message</th>
                    <th>Description</th>
                    <th>Register Date</th>
                    <th>Status</th>
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
            ajax: "{{ route('get-complain-solution') }}",
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
                { data: 'name', name: 'name', className: 'text-center' },
                {
                    data: 'message',
                    name: 'message',
                    className: 'text-center',
                    render: function(data) {
                        return `<button class="btn btn-sm btn-info view-message w-100" data-message="${data.replace(/"/g, '&quot;')}">View</button>`;
                    }
                },
                {
                    data: 'description',
                    name: 'description',
                    className: 'text-center',
                    render: function(data) {
                        return `<button class="btn btn-sm btn-info view-description w-100" data-description="${data.replace(/"/g, '&quot;')}">View</button>`;
                    }
                },
                { data: 'created_at', name: 'created_at', className: 'text-center' },
                {
                    data: 'status',
                    name: 'status',
                    className: 'text-center',
                    render: function (data) {
                        if (data == 0) return '<span class="badge bg-warning">In Process</span>';
                        else if (data == 1) return '<span class="badge bg-info text-dark">Review</span>';
                        else if (data == 2) return '<span class="badge bg-success">Complete</span>';
                        else return '<span class="badge bg-secondary">Unknown</span>';
                    }
                },
                { data: 'action', name: 'action', orderable: false, searchable: false, className: 'text-center' }
            ]
        });
    });

    $(document).on('click', '.delete', function() {
        var id = $(this).data("id");
        if (confirm("Are you sure you want to delete this post?")) {
            $.ajax({
                url: "/deleteUpcomingEvent/" + id,
                type: "DELETE",
                data: { _token: "{{ csrf_token() }}" },
                success: function(response) {
                    alert(response.success);
                    $('#users-table').DataTable().ajax.reload();
                },
                error: function() {
                    alert('Error deleting post.');
                }
            });
        }
    });

    $(document).on('click', '.view-message', function () {
        $('#messageModalContent').html($(this).data('message'));
        $('#messageModal').modal('show');
    });

    $(document).on('click', '.view-description', function () {
        $('#descriptionModalContent').html($(this).data('description'));
        $('#descriptionModal').modal('show');
    });

   // Trigger on change of status
$(document).on('change', '#edit_status', function () {
    if ($(this).val() == '2') {
        $('#completeFields').slideDown();  // Show fields if status is Complete
    } else {
        $('#completeFields').slideUp();    // Hide otherwise
    }
});

// Also trigger when form loads data (on edit click)
$(document).on('click', '.edit-btn', function () {
    let id = $(this).data('id');

    $.ajax({
        url: `/complain-solution/edit/${id}`,
        type: 'GET',
        success: function (data) {
            $('#edit_id').val(data.id);
            $('#edit_name').val(data.name);
            $('#edit_phone').val(data.phone);
            $('#edit_city').val(data.city);
            $('#edit_video_url').val(data.video_url);
            $('#edit_message').val(data.message);
            $('#edit_description').val(data.description);
            $('#edit_status').val(data.status);

            // View file links (adjust path according to your Laravel public storage)
            $('#view_document_1').attr('href', `/storage/uploads/${data.upload_document_1 || ''}`);
            $('#view_document_2').attr('href', `/storage/uploads/${data.upload_document_2 || ''}`);
            $('#view_document_3').attr('href', `/storage/uploads/${data.solution_file || ''}`);

            if (data.status == 2) {
                $('#completeFields').slideDown();
                $('#completion_date').val(data.completion_date || '');
                $('#solution_title').val(data.solution_title || '');
                $('#solution_description').val(data.solution_description || '');
            } else {
                $('#completeFields').hide();
            }

            $('#editUserSection').slideDown();
        }
    });
});


    $('#cancelEditBtn').click(function () {
        $('#editUserSection').slideUp();
    });

  $('#inlineEditForm').submit(function (e) {
    e.preventDefault();

    let formData = new FormData(this); // automatically includes hidden id field

    formData.append('_token', '{{ csrf_token() }}'); // add CSRF token

    $.ajax({
        url: `/complain-solution/update`,
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function (res) {
            alert('Complaint updated successfully!');
            $('#editUserSection').slideUp();
            $('#users-table').DataTable().ajax.reload();
        },
        error: function (err) {
            alert('Something went wrong!');
            console.log(err);
        }
    });
});

    



    </script>

    <div class="modal fade" id="messageModal" tabindex="-1" aria-labelledby="messageModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Message</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body" id="messageModalContent"></div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="descriptionModal" tabindex="-1" aria-labelledby="descriptionModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Description</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body" id="descriptionModalContent"></div>
        </div>
      </div>
    </div>
@endsection

@extends('layouts.admin-layout')

@section('title', 'Coordinator Report')

@section('content')
<div id="editUserSection" class="container mt-4" style="display:none; animation: slideDown 0.5s ease;">
    <h5 class="text-center">Edit User</h5>
    <form id="inlineEditForm" enctype="multipart/form-data" method="POST">
        <div id="inlineEditFormContent">
            <!-- AJAX content will be loaded here -->
        </div>
        <div class="text-center mt-3">
            <button type="submit" class="btn btn-success">Update</button>
            <button type="button" id="cancelEditBtn" class="btn btn-secondary">Cancel</button>
        </div>
    </form>
</div>
<div class="container mt-4">

    <!-- Coordinator Selection -->
    <div class="text-center mb-4">
        <h4>Select Coordinator</h4>
        <select id="coordinatorSelect" class="form-control w-50 mx-auto">
            <option value="" disabled selected>-- Select Coordinator --</option>
            @foreach($coordinators as $coordinator)
                <option value="{{ $coordinator->id }}">{{ $coordinator->name }}</option>
            @endforeach
        </select>
    </div>

    <!-- Edit Modal -->


    <!-- Coordinator Details -->
    <div id="coordinatorDetails" style="display: none;">
        <table class="table table-bordered text-center">
            <thead class="thead-dark">
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>Email</th>
                    <th>Designation</th>
                    <th>Date</th>
                    <!-- <th>Action</th> -->
                </tr>
            </thead>
            <tbody id="detailsBody"></tbody>
        </table>
        <p class="text-center mt-3" id="customerCount"></p>
    </div>

    <!-- User List Created by Coordinator -->
    <div id="userListSection" class="mt-4" style="display: none;">
        <h5 class="text-center">Users Created by this Coordinator</h5>
        <table class="table table-bordered text-center">
            <thead class="thead-light">
                <tr>
                    <th>Name</th>
                    <th>Mobile Number</th>
                    <th>City</th>
                    <th>Status</th>
                    <th>Apply Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="userListBody"></tbody>
        </table>
    </div>

</div>

<!-- Bootstrap Badge Styling (in case not globally included) -->
<style>
    @keyframes slideDown {
    from { transform: translateY(-50px); opacity: 0; }
    to { transform: translateY(0); opacity: 1; }
}
.badge {
    padding: 0.4em 0.6em;
    font-size: 0.75rem;
    font-weight: 600;
    border-radius: 0.35rem;
}
.badge-success { background-color: #28a745; color: #fff; }
.badge-danger { background-color: #dc3545; color: #fff; }
.badge-warning { background-color: #ffc107; color: #212529; }
.table>:not(caption)>*>* {
    padding: 0.5rem 2.5rem;
}
</style>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$('#coordinatorSelect').change(function () {
    let coordinatorId = $(this).val();

    if (coordinatorId) {
        $.get('/coordinator/data/' + coordinatorId, function (data) {

            // Coordinator Info
            $('#detailsBody').html(`
                <tr>
                    <td>
                        ${data.coordinator.image ? `<img src="/storage/uploads/${data.coordinator.image}" width="110" />` : 'No Image'}
                    </td>
                    <td>${data.coordinator.name}</td>
                    <td>${data.coordinator.gender ?? 'N/A'}</td>
                    <td>${data.coordinator.email}</td>
                    <td>${data.coordinator.designation ?? 'N/A'}</td>
                    <td>${data.coordinator.created_at ? new Date(data.coordinator.created_at).toLocaleDateString() : 'N/A'}</td>
                    
                </tr>
            `);

            $('#customerCount').text(`This coordinator has created ${data.customers.length} customers.`);
            $('#coordinatorDetails').show();

            // Users Created by Coordinator
            let userHtml = '';
            if (data.customers.length > 0) {
                data.customers.forEach(customer => {
                    let statusBadge = '';
                    if (customer.status === 1) {
                        statusBadge = '<span class="badge badge-success">Verified</span>';
                    } else if (customer.status === 0) {
                        statusBadge = '<span class="badge badge-danger">Unverified</span>';
                    } else if (customer.status === 2) {
                        statusBadge = '<span class="badge badge-warning">Pending</span>';
                    }

                    userHtml += `
                        <tr>
                            <td>${customer.name}</td>
                            <td>${customer.mobile_number}</td>
                            <td>${customer.district}</td>
                            <td>${statusBadge}</td>
                            <td>${new Date(customer.created_at).toLocaleDateString()}</td>
                              <td>
                
      <a href="javascript:void(0);" class="btn btn-edit-user" data-id="${customer.id}" style="margin-left:8px;">
    <img src="{{ asset('images/edit.png') }}" alt="Edit" style="height:28px;">
</a>
                <a href="javascript:void(0);" data-id="${customer.id}" class="btn delete">
                    <img src="{{ asset('images/delete.png') }}" alt="Delete" style="height:28px;">
                </a>
            </td>
                        </tr>
                    `;
                });
            } else {
                userHtml = `<tr><td colspan="5">No users created.</td></tr>`;
            }

            $('#userListBody').html(userHtml);
            $('#userListSection').show();
        });
    }
});
$(document).on('click', '.btn-edit-user', function () {
    let userId = $(this).data('id');

    $.get('/user/edit-inline/' + userId, function (formHtml) {
        $('#inlineEditFormContent').html(formHtml);
        $('#editUserSection').slideDown();
        $('html, body').animate({
            scrollTop: $('#editUserSection').offset().top
        }, 500);
    });
});

$('#cancelEditBtn').click(function () {
    $('#editUserSection').slideUp();
    $('#inlineEditFormContent').html('');
});
  $(document).on('click', '.delete', function () {
    if (!confirm('Are you sure you want to delete this coordinator?')) return;

    let userId = $(this).data('id');

    // Generate dynamic Laravel route with ID
    let routeTemplate = "{{ route('user.delete', ['id' => '__ID__']) }}";
    let deleteUrl = routeTemplate.replace('__ID__', userId);

    $.ajax({
        url: deleteUrl,
        type: 'POST',
        data: {
            _token: '{{ csrf_token() }}',
            _method: 'DELETE'
        },
        success: function (response) {
            alert(response.success || 'User deleted successfully.');
            userTable.ajax.reload(null, false); // 🔁 Reload DataTable on same page
        },
        error: function (xhr) {
            console.error(xhr.responseText);
            alert('Failed to delete user.');
        }
    });
});
</script>
@endsection

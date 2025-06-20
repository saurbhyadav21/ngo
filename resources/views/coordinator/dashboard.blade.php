

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
      rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" 
      crossorigin="anonymous">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
      
    </script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
  <style media="screen">
  .navbar{
    height: 60px!important;
  }
  #brand{
      color:white;
      font-family: 'Bree Serif', serif;


  }
@media screen and (max-width:770px) {
  .navbar{
    height: 54px!important;
  }
  .nav2{
    height: 36px!important;
  }
}
.navbar{
background: #0575E6;
background: -webkit-linear-gradient(to right, #021B79, #0575E6); 
background: linear-gradient(to right, #021B79, #0575E6);
}
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
<body>
<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <div class="container-fluid d-flex justify-content-between align-items-center">

        <div class="mx-auto">
            <h4 class="text-white m-0 nav-heading">Welcome {{ Auth::user()->name }}</h4>
        </div>

        <div class="ml-auto">
            <a href="coordinator-logout.php" class="btn btn-light">
                <i class="fa fa-sign-out" aria-hidden="true"></i> Logout
            </a>
        </div>

    </div>
</nav>

 <div class="d-flex justify-content-end mb-2 " style="margin-top: 70px; margin-right: 20px;">
    <a href="{{ route('add-user') }}" class="btn btn-primary" style="padding: 6px 60px; font-size: 14px;">
        Add User
    </a>
</div>

   <div style="overflow-x:auto;">
    <table id="users-table" class="display nowrap" style="width:100%">
        <thead>
            <tr>
                <th >#</th>
                <th>User ID</th>
                <th>Name</th>
                <!-- <th>Date Of Birth</th> -->
                <!-- <th>Relation</th> -->
                <!-- <th>Profession</th> -->
                <!-- <th>Blood Group</th> -->
                
                <th>Mobile No.</th>
                <th>State</th>
                <th>Status</th>
                <!-- <th>Aadhar Number</th> -->
                <!-- <th>Address</th> -->
                <!-- <th>Pincode</th> -->
                <!-- <th>Email</th> -->
                <th>Apply Date</th>
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
            ajax: "{{ route('getCustomers.index') }}",
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
    { data: 'id', name: 'id', className: 'text-center'  },
    { data: 'name', name: 'name', className: 'text-center'  },
    // { data: 'gender', name: 'gender' },
    // { data: 'dob', name: 'dob' },
    // { data: 'relation', name: 'relation' },
    // { data: 'profession', name: 'profession' },
    // { data: 'blood_group', name: 'blood_group' },
    // { data: 'district', name: 'district' },
    { data: 'mobile_number', name: 'mobile_number' , className: 'text-center' },
     { data: 'state', name: 'state', className: 'text-center'  },
     { 
    data: 'status', 
    name: 'status',
    className: 'text-center' ,
    render: function(data, type, row) {
        if (data == 0) {
            return '<span class="badge bg-danger">Inactive</span>';
        } else if (data == 1) {
            return '<span class="badge bg-success">Active</span>';
        } else if (data == 2) {
            return '<span class="badge bg-warning text-dark">Pending</span>';
        } else {
            return '<span class="badge bg-secondary">Unknown</span>';
        }
    }
},

    // { data: 'address', name: 'address' },
    // { data: 'pin_code', name: 'pin_code' },
    // { data: 'email', name: 'email' },  
    { data: 'created_at', name: 'created_at' , className: 'text-center' },
    // { data: 'profile_image', name: 'profile_image' },
    { data: 'action', name: 'action', orderable: false, searchable: false, className: 'text-center'  }
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
</body>
</html>













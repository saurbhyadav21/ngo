<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
      rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" 
      crossorigin="anonymous">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
      
    </script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
<div class="container py-4">
    <h2 class="mb-4">User Details</h2>
    <table class="table table-bordered">
         <tr>
            <th>Name</th>
            <td>{{ $data->name }}</td>
        </tr>
        <tr>
            <th>Gender</th>
            <td>{{ $data->gender }}</td>
        </tr>
         <tr>
            <th>Date Of Birth</th>
            <td>{{ $data->dob }}</td>
        </tr>
           <tr>
            <th>Profession</th>
            <td>{{ $data->profession }}</td>
        </tr>
         <tr>
            <th>Relation Type</th>
            <td>{{ $data->relation_type }}</td>
        </tr>
         <tr>
            <th>Relation Name</th>
            <td>{{ $data->relation_name }}</td>
        </tr>
         <tr>
             <th>Blood Group</th>
            <td>{{ $data->blood_group }}</td>
        </tr>
         <tr>
            <th>State</th>
            <td>{{ $data->state }}</td>
        </tr>
         <tr>
            <th>District</th>
            <td>{{ $data->district }}</td>
        </tr>
         <tr>
            <th>Mobile Number</th>
            <td>{{ $data->mobile_number }}</td>
        </tr>
         <tr>
            <th>Aadhar Number</th>
            <td>{{ $data->aadhar_number }}</td>
        </tr>
         <tr>
            <th>Address</th>
            <td>{{ $data->address }}</td>
        </tr>
        <tr>
            <th>Pincode</th>
            <td>{{ $data->pin_code }}</td>
        </tr>    
        <tr>
            <th>Email</th>
            <td>{{ $data->email }}</td>
        </tr>
       <tr>
    <th>Profile Image</th>
    <td>
      @if($data->profile_image)
    <img src="{{ asset('storage/uploads/' . $data->profile_image) }}" alt="Profile Image" width="100">
@else
    No Image Uploaded
@endif

    </td>
</tr>



        <tr>
            <th>ID Type</th>
            <td>
         @if($data->id_type)
        {{ $data->id_type }}
    @else
        No ID Type Defined
    @endif
    </td>
        </tr>
       <tr> 
    <th>ID Image</th>
    <td>
        @if($data->id_image)
            <img src="{{ asset('storage/uploads/' . $data->id_image) }}" alt="ID Image" width="100">
        @else
            No Image Uploaded
        @endif
    </td>
</tr>

<tr>
    <th>Other Document</th>
    <td>
        @if($data->other_document)
            <img src="{{ asset('storage/uploads/' . $data->other_document) }}" alt="Other Document" width="100">
        @else
            No Image Uploaded
        @endif
    </td>
</tr>
         <tr>
            <th>validity Start</th>
            <td>{{ $data->validity_start }}</td>
        </tr>
         <tr>
            <th>Validity End</th>
            <td>{{ $data->validity_end }}</td>
        </tr>
         <tr>
            <th>Created At</th>
            <td>{{ $data->created_at }}</td>
        </tr>
         <tr>
            <th>Status</th>
            <!-- <td id="statusText">{{ $data->status == 1 ? 'Verified' : 'Unverified' }}</td> -->
             <td id="statusText">
    @if ($data->status == 1)
        <span class="badge bg-success">Verified</span>
    @elseif ($data->status == 0)
        <span class="badge bg-danger">Unverified</span>
    @elseif ($data->status == 2)
        <span class="badge bg-warning text-dark">Pending</span>
    @else
        <span class="badge bg-secondary">Unknown</span>
    @endif
</td>


        </tr>
    </table>



    <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
</div>






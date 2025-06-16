{{-- resources/views/admin-dashboard.blade.php --}}
@extends('layouts.admin-layout')

@section('title', 'Home - Admin Dashboard')

@section('content')


   <div class="container" style="padding: 20px;">
    <h1 >coordinator Details</h1>
    <table class="table table-bordered">
       
        <tr>
            <th>Name</th>
            <td>{{ $coordinator->name }}</td>
        </tr>
       <tr>
    <th>Image</th>
    <td>
        @if($coordinator->image)
            <img src="{{ asset('storage/uploads/' . $coordinator->image) }}" alt="Doner Image" style="height: 100px; border-radius: 8px;">
        @else
            No image available
        @endif
    </td>
</tr>

         <tr>
            <th>Gender</th>
            <td>{{ $coordinator->gender }}</td>
        </tr>
         <tr>
            <th>Phone</th>
            <td>{{ $coordinator->mobile }}</td>
        </tr>
         <tr>
             <th>Email</th>
            <td>{{ $coordinator->email }}</td>
        </tr>
         <tr>
             <th>Date Of Birth</th>
            <td>{{ $coordinator->dob }}</td>
        </tr>
         <tr>
            <th>Address</th>
            <td>{{ $coordinator->address }}</td>
        </tr>
         <tr>
            <th>Pincode</th>
            <td>{{ $coordinator->pincode }}</td>
        </tr>
         <tr>
            <th>State</th>
            <td>{{ $coordinator->state }}</td>
        </tr>
         <tr>
            <th>City</th>
            <td>{{ $coordinator->city }}</td>
        </tr>
        <tr>
            <th>Created At</th>
            <td>{{ $coordinator->created_at }}</td>
        </tr>    

       
        

    </table>
    <a href="{{ url()->previous() }}" class="btn btn-secondary w-100">Back</a>
</div>




@endsection
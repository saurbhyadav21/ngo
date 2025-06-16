{{-- resources/views/admin-dashboard.blade.php --}}
@extends('layouts.admin-layout')

@section('title', 'Home - Admin Dashboard')

@section('content')


   <div class="container" style="padding: 20px;">
    <h1 >Manager Details</h1>
    <table class="table table-bordered">
       
        <tr>
            <th>Name</th>
            <td>{{ $manager->name }}</td>
        </tr>
       <tr>
    <th>Image</th>
    <td>
        @if($manager->image)
            <img src="{{ asset('storage/uploads/' . $manager->image) }}" alt="Doner Image" style="height: 100px; border-radius: 8px;">
        @else
            No image available
        @endif
    </td>
</tr>

         <tr>
            <th>Gender</th>
            <td>{{ $manager->gender }}</td>
        </tr>
         <tr>
            <th>Phone</th>
            <td>{{ $manager->phone }}</td>
        </tr>
         <tr>
             <th>Email</th>
            <td>{{ $manager->email }}</td>
        </tr>
         <tr>
             <th>Date Of Birth</th>
            <td>{{ $manager->dob }}</td>
        </tr>
         <tr>
            <th>Address</th>
            <td>{{ $manager->address }}</td>
        </tr>
         <tr>
            <th>Pincode</th>
            <td>{{ $manager->pincode }}</td>
        </tr>
         <tr>
            <th>State</th>
            <td>{{ $manager->state }}</td>
        </tr>
         <tr>
            <th>City</th>
            <td>{{ $manager->city }}</td>
        </tr>
        <tr>
            <th>Created At</th>
            <td>{{ $manager->created_at }}</td>
        </tr>    

       
        

    </table>
    <a href="{{ url()->previous() }}" class="btn btn-secondary w-100">Back</a>
</div>




@endsection
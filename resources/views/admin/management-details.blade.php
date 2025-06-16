{{-- resources/views/admin-dashboard.blade.php --}}
@extends('layouts.admin-layout')

@section('title', 'Home - Admin Dashboard')

@section('content')


   <div class="container" style="padding: 20px;">
    <h1 >Management Details</h1>
    <table class="table table-bordered">
       
        <tr>
            <th>Name</th>
            <td>{{ $managementId->name }}</td>
        </tr>
       <tr>
    <th>Image</th>
    <td>
        @if($managementId->image)
            <img src="{{ asset('storage/uploads/' . $managementId->image) }}" alt="Doner Image" style="height: 100px; border-radius: 8px;">
        @else
            No image available
        @endif
    </td>
</tr>

         <tr>
            <th>Designation</th>
            <td>{{ $managementId->designation }}</td>
        </tr>
         <tr>
            <th>Phone</th>
            <td>{{ $managementId->mobile }}</td>
        </tr>
         <tr>
             <th>Email</th>
            <td>{{ $managementId->email }}</td>
        </tr>
         <tr>
            <th>Category</th>
            <td>{{ $managementId->category }}</td>
        </tr>
         <tr>
            <th>Position</th>
            <td>{{ $managementId->position }}</td>
        </tr>
         
        <tr>
            <th>Created At</th>
            <td>{{ $managementId->created_at }}</td>
        </tr>    

       
        

    </table>
    <a href="{{ url()->previous() }}" class="btn btn-secondary w-100">Back</a>
</div>




@endsection
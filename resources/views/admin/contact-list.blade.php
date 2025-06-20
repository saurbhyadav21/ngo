@extends('layouts.admin-layout') {{-- Or your layout file --}}

@section('title', 'Contact List')

@section('content')
<div class="container mt-5">
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

    <h2 class="mb-4">Contact List</h2>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th class="text-center">#</th>
        <th class="text-center">Name</th>
        <th class="text-center">Email</th>
        <th class="text-center">Phone</th>
        <th class="text-center">Topic</th>
        <th class="text-center">Description</th>
        <th class="text-center">Register Date</th>
        <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($contacts as $index => $contact)
                <tr>
                    <td class="text-center">{{ $index + 1 }}</td>
    <td class="text-center">{{ $contact->name }}</td>
    <td class="text-center">{{ $contact->email }}</td>
    <td class="text-center">{{ $contact->phone }}</td>
    <td class="text-center">{{ $contact->topic }}</td>
    <td class="text-center">{{ $contact->description }}</td>
    <td class="text-center">{{ $contact->created_at }}</td>
    <td class="text-center">
    <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this contact?');" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" style="border:none; background:none; padding:0;">
            <img src="{{ asset('images/delete.png') }}" alt="Delete" style="height:30px;">
        </button>
    </form>
    </td>

                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">No contacts found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection

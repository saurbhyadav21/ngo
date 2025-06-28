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
      <td class="text-center">
        <button class="btn btn-outline-primary btn-sm view-btn" 
                data-title="Topic"
                data-content="{{ $contact->topic }}">
            View
        </button>
    </td>

    <!-- View Description -->
    <td class="text-center">
        <button class="btn btn-outline-info btn-sm view-btn" 
                data-title="Description"
                data-content="{{ $contact->description }}">
            View
        </button>
    </td>
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
<!-- Modal -->
<div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content rounded-4 shadow" style="max-height: 90vh;">
      <div class="modal-header">
        <h5 class="modal-title" id="viewModalLabel">View</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body" id="modalContent" style="white-space: pre-wrap; overflow-wrap: break-word;">
        <!-- Content will appear here -->
      </div>

    </div>
  </div>
</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    
document.addEventListener('DOMContentLoaded', function () {
    const viewButtons = document.querySelectorAll('.view-btn');
    const modalTitle = document.getElementById('viewModalLabel');
    const modalContent = document.getElementById('modalContent');

    viewButtons.forEach(btn => {
        btn.addEventListener('click', function () {
            const title = this.dataset.title;
            const content = this.dataset.content;

            modalTitle.textContent = title;
            modalContent.textContent = content;

            const modal = new bootstrap.Modal(document.getElementById('viewModal'));
            modal.show();
        });
    });
});
</script>

@endsection

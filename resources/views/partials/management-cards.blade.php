@forelse($managementTeams as $member)
<div class="col">
    <div class="card h-100 shadow rounded-4 p-3" style="min-height: 420px;">
        <div class="text-center">
            <img src="{{ asset('storage/uploads/' . $member->image) }}"
                 alt="{{ $member->name }}"
                 width="260" height="260"
                 class="mx-auto d-block rounded mb-3"
                 style="object-fit: cover;">
        </div>
        <h5 class="text-center mb-2">{{ ucwords(strtolower($member->name)) }}</h5>
        <p class="mb-1"><strong>Position:</strong> {{ $member->position }}</p>
        <p class="mb-1"><strong>Designation:</strong> {{ $member->designation }}</p>
        <p class="mb-0"><strong>Mobile:</strong> {{ $member->mobile }}</p>
    </div>
</div>
@empty
<p class="text-center py-4 col-12">No management member found 😕</p>
@endforelse

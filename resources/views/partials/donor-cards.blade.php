@forelse ($donors as $donor)
    <div class="col">
        <div class="card h-100 shadow rounded-4 p-3" style="min-height: 420px;">
            <div class="text-center">
                <img src="{{ asset('storage/uploads/' . $donor->image) }}"
                     alt="avatar" width="260" height="260"
                     class="mx-auto d-block rounded mb-3"
                     style="object-fit: cover;">
            </div>
            <h5 class="text-center mb-2">{{ ucwords(strtolower($donor->name)) }}</h5>
            <p class="mb-1"><strong>Amount:</strong> ₹ {{ number_format($donor->amount) }}</p>
            <p class="mb-0"><strong>Mobile:</strong> {{ $donor->phone }}</p>
        </div>
    </div>
@empty
    <p class="text-center py-4 col-12">No donor found 😕</p>
@endforelse

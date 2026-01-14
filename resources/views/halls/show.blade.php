<x-layout :title="'Hall ' . $hall->hallNumber">
    <section class="p-8">
        <h2 class="text-2xl text-gold">Hall {{ $hall->hallNumber }}</h2>
        <p class="text-silver">Capacity: {{ $hall->capacity }}</p>
        <p class="text-silver">Cinema: {{ $hall->cinema->cinemaName ?? '—' }}</p>
        <a href="{{ route('halls.edit', $hall) }}" class="text-gold">Edit</a>
    </section>
</x-layout>

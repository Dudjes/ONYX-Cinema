<x-layout title="Halls">
    <section class="p-8">
        <h2 class="text-2xl text-gold mb-4">Halls</h2>
        <a href="{{ route('halls.create') }}" class="bg-gold px-3 py-2 rounded">Create Hall</a>
        <div class="mt-4">
            <ul>
                @foreach ($halls as $h)
                    <li class="py-2 border-b">Hall {{ $h->hallNumber }} — {{ $h->capacity }} seats —
                        {{ $h->cinema->cinemaName ?? '—' }}
                        <a href="{{ route('halls.show', $h) }}" class="ml-2 text-gold">View</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </section>
</x-layout>

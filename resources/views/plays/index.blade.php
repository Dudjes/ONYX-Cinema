<x-layout title="Plays">
    <section class="p-8">
        <h2 class="text-2xl text-gold mb-4">Plays</h2>
        <a href="{{ route('plays.create') }}" class="bg-gold px-3 py-2 rounded">Create Play</a>
        <div class="mt-4">
            <ul>
                @foreach ($plays as $p)
                    <li class="py-2 border-b">{{ $p->movie->movieName ?? '—' }} — {{ $p->when }} —
                        {{ $p->cinema->cinemaName ?? '' }}
                        <a href="{{ route('plays.show', $p) }}" class="ml-2 text-gold">View</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </section>
</x-layout>

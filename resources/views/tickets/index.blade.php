<x-layout title="Tickets">
    <section class="p-8">
        <h2 class="text-2xl text-gold mb-4">Tickets</h2>
        <a href="{{ route('tickets.create') }}" class="bg-gold px-3 py-2 rounded">Create Ticket</a>
        <div class="mt-4">
            <ul>
                @foreach ($tickets as $t)
                    <li class="py-2 border-b">Seat {{ $t->seat }} — {{ $t->play->movie->movieName ?? '—' }} —
                        {{ $t->user->firstname ?? ($t->user->name ?? '') }}
                        <a href="{{ route('tickets.show', $t) }}" class="ml-2 text-gold">View</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </section>
</x-layout>

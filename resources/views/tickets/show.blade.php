<x-layout :title="'Ticket ' . $ticket->ticketId">
    <section class="p-8">
        <h2 class="text-2xl text-gold">Ticket {{ $ticket->ticketId }}</h2>
        <p class="text-silver">Seat: {{ $ticket->seat }}</p>
        <p class="text-silver">Play: {{ $ticket->play->movie->movieName ?? '—' }} at {{ $ticket->play->when ?? '—' }}</p>
        <p class="text-silver">User: {{ $ticket->user->firstname ?? ($ticket->user->name ?? '—') }}</p>
        <a href="{{ route('tickets.edit', $ticket) }}" class="text-gold">Edit</a>
    </section>
</x-layout>

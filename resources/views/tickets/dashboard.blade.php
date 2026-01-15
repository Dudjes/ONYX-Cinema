<x-layout title="Dashboard - Tickets">

    <section class="py-12 px-6 lg:px-12">
        <div class="container mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">

                {{-- Sidebar --}}
                <aside class="lg:col-span-1 bg-charcoal rounded-2xl p-6">
                    <h3 class="text-lg font-semibold text-gold mb-2">Welcome, {{ Auth::user()->name }}</h3>
                    <p class="text-sm text-silver">Overview & quick actions</p>

                    <div class="mt-6 space-y-3">
                        <a href="{{ route('tickets.create') }}"
                           class="block bg-gold text-onyx px-4 py-2 rounded-lg font-semibold hover:bg-cyan transition">
                            Book Ticket
                        </a>
                        <a href="{{ route('tickets.index') }}"
                           class="block px-4 py-2 border border-gold text-gold rounded-lg hover:bg-gold/10">
                            View Tickets
                        </a>
                    </div>
                </aside>

                {{-- Main Dashboard --}}
                <main class="lg:col-span-3 bg-charcoal rounded-2xl p-6">

                    {{-- Header --}}
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-2xl font-display text-gold">Ticket Dashboard</h2>
                        <p class="text-sm text-silver">Quick stats</p>
                    </div>

                    {{-- Stats Cards --}}
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-8">
                        <div class="p-4 bg-onyx/30 rounded-lg text-center">
                            <p class="text-sm text-silver">Tickets Sold</p>
                            <p class="text-2xl text-gold font-bold">{{ $soldTickets }}</p>
                        </div>
                        <div class="p-4 bg-onyx/30 rounded-lg text-center">
                            <p class="text-sm text-silver">Tickets Available</p>
                            <p class="text-2xl text-gold font-bold">{{ $availableTickets }}</p>
                        </div>
                        <div class="p-4 bg-onyx/30 rounded-lg text-center">
                            <p class="text-sm text-silver">Total Seats</p>
                            <p class="text-2xl text-gold font-bold">{{ $totalSeats }}</p>
                        </div>
                    </div>

                    {{-- Tickets Table --}}
                    <div class="overflow-x-auto bg-onyx/10 rounded-lg">
                        <table class="min-w-full divide-y divide-onyx">
                            <thead class="bg-onyx/20 text-silver text-xs uppercase">
                                <tr>
                                    <th class="px-4 py-3 text-left">Seat</th>
                                    <th class="px-4 py-3 text-left">Movie</th>
                                    <th class="px-4 py-3 text-left">Cinema</th>
                                    <th class="px-4 py-3 text-left">Play Date</th>
                                    <th class="px-4 py-3 text-left">User</th>
                                    <th class="px-4 py-3 text-left">Status</th>
                                    <th class="px-4 py-3 text-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-onyx/5 divide-y divide-onyx text-sm text-silver">
                                @forelse ($tickets as $ticket)
                                    <tr class="hover:bg-onyx/20">
                                        <td class="px-4 py-3">{{ $ticket->seat }}</td>
                                        <td class="px-4 py-3">{{ $ticket->play->movie->movieName ?? '—' }}</td>
                                        <td class="px-4 py-3">{{ $ticket->play->cinema->cinemaName ?? '—' }}</td>
                                        <td class="px-4 py-3">
                                            {{ \Carbon\Carbon::parse($ticket->play->when)->format('D d M Y · H:i') }}
                                        </td>
                                        <td class="px-4 py-3">{{ $ticket->user->firstname ?? ($ticket->user->name ?? '—') }}</td>
                                        <td class="px-4 py-3">
                                            @if($ticket->isSold)
                                                <span class="text-emerald-400 font-semibold">Sold</span>
                                            @else
                                                <span class="text-red-500 font-semibold">Available</span>
                                            @endif
                                        </td>
                                        <td class="px-4 py-3 text-right flex justify-end gap-2">
                                            <a href="{{ route('tickets.show', $ticket) }}"
                                               class="px-3 py-1 bg-onyx/20 border border-onyx text-silver rounded hover:bg-onyx/30">View</a>
                                            <a href="{{ route('tickets.edit', $ticket) }}"
                                               class="px-3 py-1 bg-green-600 text-white rounded hover:bg-green-500">Edit</a>
                                            <form action="{{ route('tickets.destroy', $ticket) }}" method="POST"
                                                  onsubmit="return confirm('Delete this ticket?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                        class="px-3 py-1 border border-red-500 text-red-500 rounded hover:bg-red-500 hover:text-onyx">
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="px-4 py-6 text-center text-silver">
                                            No tickets booked yet 🎫
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </main>
            </div>
        </div>
    </section>

</x-layout>

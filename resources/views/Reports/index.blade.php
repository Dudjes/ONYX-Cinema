<x-layout :title="'My Report'">

    <section class="py-16 px-6 lg:px-12">
        <div class="container mx-auto">

            <h1 class="text-5xl font-bold text-gold mb-12">My Report</h1>

            {{-- User info --}}
            <div class="bg-charcoal rounded-2xl p-8 shadow-xl border border-gold/20 mb-4">
                <h2 class="text-3xl text-gold font-semibold mb-4">My Info</h2>
                <ul class="text-silver space-y-2">
                    <li><strong>Name:</strong> {{ $user->name }}</li>
                    <li><strong>Email:</strong> {{ $user->email }}</li>
                    <li><strong>Total Tickets Bought:</strong> {{ $totalTickets }}</li>
                </ul>

                {{-- Generate PDF Button --}}
                <div class="mt-6">
                    <a href="{{ route('report.pdf') }}"
                       class="inline-block bg-gold text-onyx px-6 py-3 rounded-xl font-semibold hover:bg-cyan transition shadow-lg">
                        📄 Generate PDF Report
                    </a>
                </div>
            </div>

            {{-- Tickets per movie --}}
            <div class="bg-charcoal rounded-2xl p-8 shadow-xl border border-gold/20 mb-10">
                <h2 class="text-3xl text-gold font-semibold mb-4">Tickets per Movie</h2>
                <ul class="text-silver">
                    @foreach ($ticketsPerMovie as $movieName => $count)
                        <li>{{ $movieName }}: {{ $count }}</li>
                    @endforeach
                </ul>
            </div>

            {{-- Ticket list --}}
            <div class="bg-charcoal rounded-2xl p-8 shadow-xl border border-gold/20">
                <h2 class="text-3xl text-gold font-semibold mb-4">My Tickets</h2>
                @if ($tickets->isEmpty())
                    <p class="text-silver opacity-70">You haven’t bought any tickets yet.</p>
                @else
                    <table class="w-full table-auto text-left border-collapse">
                        <thead class="bg-gold/10 text-gold">
                            <tr>
                                <th class="px-6 py-4">Movie</th>
                                <th class="px-6 py-4">Play Date</th>
                                <th class="px-6 py-4">Time</th>
                                <th class="px-6 py-4">Seat</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tickets as $ticket)
                                <tr class="border-t border-gold/10 hover:bg-gold/5 transition">
                                    <td class="px-6 py-4 text-silver">{{ $ticket->play->movie->movieName ?? '—' }}</td>
                                    <td class="px-6 py-4 text-silver">{{ \Carbon\Carbon::parse($ticket->play->date)->format('d M Y') }}</td>
                                    <td class="px-6 py-4 text-silver">{{ \Carbon\Carbon::parse($ticket->play->time)->format('H:i') }}</td>
                                    <td class="px-6 py-4 text-silver">{{ $ticket->seat ?? '—' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>

        </div>
    </section>

</x-layout>

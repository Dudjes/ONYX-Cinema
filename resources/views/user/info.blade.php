<x-layout :title="'My Account'">

    <section class="py-16 px-6 lg:px-12">
        <div class="container mx-auto">

            {{-- User Info --}}
            <div class="mb-12">
                <h1 class="text-5xl font-bold text-gold mb-6">My Account</h1>

                <div class="bg-charcoal rounded-2xl p-8 shadow-xl border border-gold/20 max-w-3xl">
                    <h2 class="text-2xl font-semibold text-gold mb-4">Personal Information</h2>

                    <ul class="text-silver space-y-2">
                        <li><strong>Name:</strong> {{ $user->name }}</li>
                        <li><strong>Email:</strong> {{ $user->email }}</li>
                        <li><strong>Registered:</strong> {{ $user->created_at->format('d M Y') }}</li>
                    </ul>
                    <div class="flex justify-start mt-4">
                        <a href="{{ route('user.edit', $user) }}"
                        class="bg-gold text-onyx px-4 py-2 rounded-lg font-semibold hover:bg-cyan transition">
                            Edit Info
                        </a>
                    </div>
                </div>
            </div>

            {{-- Tickets --}}
            <div>
                <h2 class="text-3xl font-display text-gold mb-6">My Tickets</h2>

                @if ($user->tickets->isEmpty())
                    <p class="text-silver opacity-70">You haven’t bought any tickets yet.</p>
                @else
                    <div class="w-full bg-charcoal rounded-2xl border border-gold/20 shadow-xl overflow-x-auto">
                        <table class="w-full table-auto text-left">
                            <thead class="bg-gold/10 text-gold">
                                <tr>
                                    <th class="px-6 py-4">Movie</th>
                                    <th class="px-6 py-4">Play Date</th>
                                    <th class="px-6 py-4">Time</th>
                                    <th class="px-6 py-4">Cinema</th>
                                    <th class="px-6 py-4">Hall</th>
                                    <th class="px-6 py-4">Seat</th>
                                    <th class="px-6 py-4">Booked On</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($user->tickets as $ticket)
                                    <tr class="border-t border-gold/10 hover:bg-gold/5 transition">
                                        <td class="px-6 py-4 text-silver">
                                            {{ $ticket->play->movie->movieName ?? '—' }}
                                        </td>
                                        <td class="px-6 py-4 text-silver">
                                            {{ \Carbon\Carbon::parse($ticket->play->date)->format('d M Y') }}
                                        </td>
                                        <td class="px-6 py-4 text-silver">
                                            {{ \Carbon\Carbon::parse($ticket->play->time)->format('H:i') }}
                                        </td>
                                        <td class="px-6 py-4 text-silver">
                                            {{ $ticket->play->cinema->cinemaName ?? '—' }}
                                        </td>
                                        <td class="px-6 py-4 text-silver">
                                            {{ $ticket->play->hall->hallNumber ?? '—' }}
                                        </td>
                                        <td class="px-6 py-4 text-silver">
                                            {{ $ticket->seat ?? '—' }}
                                        </td>
                                        <td class="px-6 py-4 text-silver">
                                            {{ $ticket->created_at->format('d M Y H:i') }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>

        </div>
    </section>

</x-layout>

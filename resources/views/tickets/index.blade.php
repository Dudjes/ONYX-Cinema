<x-layout title="Tickets">

<section class="py-12 px-6 lg:px-12">
    <div class="container mx-auto max-w-6xl">

        {{-- Header --}}
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-6 gap-4">
            <h2 class="text-3xl font-display text-gold">Tickets</h2>

            <div class="flex flex-wrap gap-4">
                <a href="{{ route('tickets.dashboard') }}"
                   class="inline-flex items-center gap-2 bg-cyan text-onyx px-5 py-3 rounded-xl font-semibold hover:bg-gold transition shadow">
                    📊 Dashboard
                </a>

                <a href="{{ route('tickets.create') }}"
                   class="inline-flex items-center gap-2 bg-gold text-onyx px-5 py-3 rounded-xl font-semibold hover:bg-cyan transition shadow">
                    ➕ Create Ticket
                </a>
            </div>
        </div>

        {{-- Filters --}}
        <form method="GET" class="mb-6 flex flex-wrap gap-4 items-end">
            
            {{-- Movie --}}
            <div>
                <label class="text-silver font-semibold block mb-1">Movie</label>
                <select name="movie" onchange="this.form.submit()"
                        class="bg-onyx border border-white/10 rounded-lg px-4 py-2 text-soft-white focus:outline-none focus:ring-2 focus:ring-gold">
                    <option value="">All Movies</option>
                    @foreach ($movies as $movie)
                        <option value="{{ $movie->movieId }}" {{ request('movie') == $movie->movieId ? 'selected' : '' }}>
                            {{ $movie->movieName }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Cinema --}}
            <div>
                <label class="text-silver font-semibold block mb-1">Cinema</label>
                <select name="cinema" onchange="this.form.submit()"
                        class="bg-onyx border border-white/10 rounded-lg px-4 py-2 text-soft-white focus:outline-none focus:ring-2 focus:ring-gold">
                    <option value="">All Cinemas</option>
                    @foreach ($cinemas as $cinema)
                        <option value="{{ $cinema->cinemaId }}" {{ request('cinema') == $cinema->cinemaId ? 'selected' : '' }}>
                            {{ $cinema->cinemaName }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- User --}}
            <div>
                <label class="text-silver font-semibold block mb-1">User</label>
                <input type="text" name="user" placeholder="Search user..."
                       value="{{ request('user') }}"
                       class="bg-onyx border border-white/10 rounded-lg px-4 py-2 text-soft-white focus:outline-none focus:ring-2 focus:ring-gold">
            </div>

            {{-- Play Date --}}
            <div>
                <label class="text-silver font-semibold block mb-1">Play Date</label>
                <input type="date" name="date" value="{{ request('date') }}"
                       class="bg-onyx border border-white/10 rounded-lg px-4 py-2 text-soft-white focus:outline-none focus:ring-2 focus:ring-gold">
            </div>

            {{-- Order by User --}}
            <div>
                <label class="text-silver font-semibold block mb-1">Order</label>
                <select name="order" onchange="this.form.submit()"
                        class="bg-onyx border border-white/10 rounded-lg px-4 py-2 text-soft-white focus:outline-none focus:ring-2 focus:ring-gold">
                    <option value="asc" {{ request('order') === 'asc' ? 'selected' : '' }}>A → Z</option>
                    <option value="desc" {{ request('order') === 'desc' ? 'selected' : '' }}>Z → A</option>
                </select>
            </div>
        </form>

        {{-- Tickets Table --}}
        <div class="bg-charcoal rounded-2xl shadow-xl overflow-hidden">
            <table class="w-full text-left">
                <thead class="bg-onyx text-silver text-sm uppercase">
                    <tr>
                        <th class="px-6 py-4">Seat</th>
                        <th class="px-6 py-4">Movie</th>
                        <th class="px-6 py-4">Cinema</th>
                        <th class="px-6 py-4">User</th>
                        <th class="px-6 py-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($tickets as $t)
                        <tr class="border-b border-gold/10 hover:bg-onyx/60 transition">
                            <td class="px-6 py-4 font-semibold text-soft-white">
                                {{ $t->seat }}
                            </td>

                            <td class="px-6 py-4 text-silver">
                                {{ $t->play->movie->movieName ?? '—' }}
                            </td>

                            <td class="px-6 py-4 text-silver">
                                {{ $t->play->cinema->cinemaName ?? '—' }}
                            </td>

                            <td class="px-6 py-4 text-silver">
                                {{ $t->user->firstname ?? ($t->user->name ?? '—') }}
                            </td>

                            <td class="px-6 py-4">
                                <div class="flex justify-end gap-2">
                                    <a href="{{ route('tickets.show', $t) }}"
                                       class="px-3 py-1 text-sm rounded-lg border border-gold text-gold hover:bg-gold/10 transition">
                                       View
                                    </a>

                                    <a href="{{ route('tickets.edit', $t) }}"
                                       class="px-3 py-1 text-sm rounded-lg bg-green-600 text-white hover:bg-green-500 transition">
                                       Edit
                                    </a>

                                    <form action="{{ route('tickets.destroy', $t) }}" method="POST"
                                          onsubmit="return confirm('Delete this ticket?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="px-3 py-1 text-sm rounded-lg bg-red-600 text-white hover:bg-red-500 transition">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-10 text-center text-silver">
                                No tickets found 🎫
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</section>

</x-layout>

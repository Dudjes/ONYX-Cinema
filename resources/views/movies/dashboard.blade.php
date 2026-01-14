<x-layout title="Dashboard - ONYX Cinema">
    <section class="py-12 px-6 lg:px-12">
        <div class="container mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">

                {{-- Sidebar --}}
                <aside class="lg:col-span-1 bg-charcoal rounded-2xl p-6">
                    <h3 class="text-lg font-semibold text-gold mb-2">Welcome, {{ Auth::user()->name }}</h3>
                    <p class="text-sm text-silver">Overview & quick actions</p>

                    <div class="mt-6 space-y-3">
                        <a href="{{ route('movies.create') }}"
                            class="block bg-gold text-onyx px-4 py-2 rounded-lg font-semibold hover:bg-cyan transition">
                            Add Movie
                        </a>
                        <a href="{{ route('movies.index') }}"
                            class="block px-4 py-2 border border-gold text-gold rounded-lg hover:bg-gold/10">
                            View Movies
                        </a>
                    </div>
                </aside>

                {{-- Main Dashboard --}}
                <main class="lg:col-span-3 bg-charcoal rounded-2xl p-6">

                    {{-- Header --}}
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-2xl font-display text-gold">Dashboard</h2>
                        <p class="text-sm text-silver">Quick stats</p>
                    </div>

                    {{-- Stats Cards --}}
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 mb-8">
                        <div class="p-4 bg-onyx/30 rounded-lg">
                            <p class="text-sm text-silver">Movies</p>
                            <p class="text-2xl text-gold font-bold">{{ \App\Models\Movie::count() }}</p>
                        </div>
                        <div class="p-4 bg-onyx/30 rounded-lg">
                            <p class="text-sm text-silver">Cinemas</p>
                            <p class="text-2xl text-gold font-bold">{{ \App\Models\Cinema::count() }}</p>
                        </div>
                        <div class="p-4 bg-onyx/30 rounded-lg">
                            <p class="text-sm text-silver">Tickets</p>
                            <p class="text-2xl text-gold font-bold">{{ \App\Models\Ticket::count() }}</p>
                        </div>
                    </div>

                    {{-- Movies Table --}}
                    <div class="mt-8">
                        <h3 class="text-lg font-semibold text-gold mb-3">All Movies</h3>
                        <div class="overflow-x-auto bg-onyx/10 rounded-lg">
                            <table class="min-w-full divide-y divide-onyx">
                                <thead class="bg-onyx/20">
                                    <tr>
                                        <th class="px-4 py-3 text-left text-xs text-silver">Poster</th>
                                        <th class="px-4 py-3 text-left text-xs text-silver">Title</th>
                                        <th class="px-4 py-3 text-left text-xs text-silver">Genre</th>
                                        <th class="px-4 py-3 text-left text-xs text-silver">Duration</th>
                                        <th class="px-4 py-3 text-left text-xs text-silver">Price</th>
                                        <th class="px-4 py-3 text-left text-xs text-silver">Age</th>
                                        <th class="px-4 py-3 text-left text-xs text-silver">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-onyx/5 divide-y divide-onyx">
                                    @foreach ($movies as $movie)
                                        <tr class="hover:bg-onyx/20">
                                            {{-- Poster --}}
                                            <td class="px-4 py-3 align-middle">
                                                @if ($movie->image)
                                                    @php
                                                        $src = Str::startsWith($movie->image, ['http://','https://','//'])
                                                            ? $movie->image
                                                            : asset('storage/' . $movie->image);
                                                    @endphp
                                                    <img src="{{ $src }}" alt="{{ $movie->movieName }}"
                                                        class="w-16 h-20 object-cover rounded" />
                                                @else
                                                    <div
                                                        class="w-16 h-20 bg-gradient-to-br from-charcoal via-gold/20 to-gold rounded flex items-center justify-center">
                                                        <span class="text-2xl opacity-20">🎬</span>
                                                    </div>
                                                @endif
                                            </td>

                                            {{-- Title --}}
                                            <td class="px-4 py-3 align-middle">
                                                <div class="text-sm text-soft-white font-semibold">{{ $movie->movieName }}</div>
                                                <div class="text-xs text-silver">{{ Str::limit($movie->description, 60) }}</div>
                                            </td>

                                            {{-- Genres --}}
                                            <td class="px-4 py-3 align-middle text-sm text-silver">
                                                {{ $movie->genres->pluck('genreName')->join(', ') ?: '—' }}
                                            </td>

                                            {{-- Duration --}}
                                            <td class="px-4 py-3 align-middle text-sm text-silver">
                                                {{ \Carbon\Carbon::parse($movie->duration)->format('H\h i\m') }}
                                            </td>

                                            {{-- Price --}}
                                            <td class="px-4 py-3 align-middle text-sm text-silver">
                                                {{ $movie->price ? '$' . number_format($movie->price, 2) : '—' }}
                                            </td>

                                            {{-- Age --}}
                                            <td class="px-4 py-3 align-middle text-sm text-silver">
                                                {{ $movie->ageRequirement }}
                                            </td>

                                            {{-- Actions --}}
                                            <td class="px-4 py-3 align-middle">
                                                <div class="flex items-center gap-2">
                                                    <a href="{{ route('movies.show', $movie->movieId) }}"
                                                        class="px-3 py-1 bg-onyx/20 border border-onyx text-silver rounded hover:bg-onyx/30">Details</a>
                                                    <a href="{{ route('movies.edit', $movie->movieId) }}"
                                                        class="px-3 py-1 bg-gold text-onyx rounded hover:bg-cyan">Update</a>
                                                    <form action="{{ route('movies.destroy', $movie->movieId) }}"
                                                        method="POST" onsubmit="return confirm('Delete this movie?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="px-3 py-1 border border-red-500 text-red-500 rounded hover:bg-red-500 hover:text-onyx">
                                                            Delete
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </main>
            </div>
        </div>
    </section>
</x-layout>

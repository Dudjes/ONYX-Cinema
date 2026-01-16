<x-layout :title="$movie->movieName">

    <section class="py-16 px-6 lg:px-12">
        <div class="container mx-auto">

            {{-- MOVIE HEADER --}}
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">

                {{-- Poster --}}
                <div>
                    <div class="bg-charcoal rounded-2xl overflow-hidden shadow-2xl border border-gold/20">
                        @if (!empty($movie->image))
                            <img src="{{ $movie->image }}"
                                 alt="{{ $movie->movieName }}"
                                 class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-96 flex items-center justify-center bg-gradient-to-br from-charcoal via-gold/20 to-gold">
                                <span class="text-9xl opacity-20">🎬</span>
                            </div>
                        @endif
                    </div>
                </div>

                {{-- Details --}}
                <div class="lg:col-span-2 flex flex-col">
                    <h1 class="text-5xl font-display text-gold font-bold mb-4">
                        {{ $movie->movieName }}
                    </h1>

                    {{-- Meta --}}
                    <div class="flex flex-wrap items-center gap-4 text-silver mb-6">
                        <div class="px-3 py-1 bg-gold text-onyx rounded-md text-sm font-semibold">
                            {{ $movie->ageRequirement }}
                        </div>

                        @if ($movie->genres->isNotEmpty())
                            <div class="flex items-center gap-2 text-sm">
                                <span class="opacity-70">🎭</span>
                                <span>{{ $movie->genres->pluck('genreName')->join(', ') }}</span>
                            </div>
                        @endif

                        <div class="flex items-center gap-2 text-sm">
                            <span class="opacity-70">⏱️</span>
                            <span>{{ \Carbon\Carbon::parse($movie->duration)->format('H\h i\m') }}</span>
                        </div>

                        @if (!empty($movie->price))
                            <div class="ml-4 text-gold font-semibold text-lg">
                                €{{ number_format($movie->price, 2) }}
                            </div>
                        @endif
                    </div>

                    {{-- Description --}}
                    <div class="prose prose-invert text-silver mb-8 max-w-none">
                        {!! nl2br(e($movie->description)) !!}
                    </div>

                    {{-- Actions --}}
                    <div class="flex flex-wrap gap-4">
                        <a href="{{route('tickets.choosePlay', $movie)}}"
                           class="bg-gold text-onyx px-6 py-3 rounded-xl font-semibold hover:bg-cyan transition-all shadow-lg">
                            🎟️ Book Tickets
                        </a>

                        <a href="{{ route('movies.index') }}"
                           class="border border-gold text-gold px-6 py-3 rounded-xl hover:bg-gold/10 transition">
                            ← Back to List
                        </a>
                    </div>
                </div>
            </div>

            {{-- PLAYS --}}
            @if ($movie->plays->isNotEmpty())
                <div id="plays" class="mt-20">

                    <h2 class="text-3xl font-display text-gold mb-6">
                        🎭 Current Plays
                    </h2>

                    <div class="w-full bg-charcoal rounded-2xl border border-gold/20 shadow-xl">
                        <table class="w-full table-fixed text-left">
                            <thead class="bg-gold/10 text-gold">
                                <tr>
                                    <th class="px-6 py-4 w-1/5">Date</th>
                                    <th class="px-6 py-4 w-1/5">Time</th>
                                    <th class="px-6 py-4 w-1/5">Cinema</th>
                                    <th class="px-6 py-4 w-1/5">Hall</th>
                                    <th class="px-6 py-4 w-1/5">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($movie->plays as $play)
                                    <tr class="border-t border-gold/10 hover:bg-gold/5 transition">
                                        <td class="px-6 py-4 text-silver">
                                            {{ \Carbon\Carbon::parse($play->date)->format('d M Y') }}
                                        </td>
                                        <td class="px-6 py-4 text-silver">
                                            {{ \Carbon\Carbon::parse($play->time)->format('H:i') }}
                                        </td>
                                        <td class="px-6 py-4 text-silver">
                                            {{ $play->cinema->cinemaName ?? '—' }}
                                        </td>
                                        <td class="px-6 py-4 text-silver">
                                            {{ $play->hall->hallNumber ?? '—' }}
                                        </td>
                                        <td class="px-6 py-4">
                                            <a href="{{ route('tickets.create', $play) }}"
                                               class="inline-block bg-gold text-onyx px-5 py-2 rounded-lg font-semibold hover:bg-cyan transition">
                                                Book
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            @else
                <div class="mt-20 text-silver opacity-70">
                    No upcoming plays for this movie.
                </div>
            @endif

        </div>
    </section>

</x-layout>

<x-layout :title="$movie->movieName">
    <section class="p-8 max-w-4xl mx-auto">

        <!-- Header -->
        <div class="mb-10 text-center">
            <h2 class="text-3xl md:text-4xl font-display text-gold mb-3">
                {{ $movie->movieName }}
            </h2>
            <p class="text-silver text-lg">
                Choose a showtime
            </p>
        </div>

        <!-- Showtime Grid -->
        <div class="grid gap-6 md:grid-cols-2">
            @foreach ($plays as $play)
                <a href="{{ route('tickets.chooseSeat', [$movie, $play]) }}"
                   class="group bg-charcoal rounded-2xl p-6 border border-white/5
                          hover:border-gold hover:-translate-y-1 hover:shadow-lg
                          transition-all duration-300">

                    <!-- Time -->
                    <div class="flex items-center justify-between mb-4">
                        <div class="text-lg font-semibold text-soft-white group-hover:text-onyx">
                            {{ \Carbon\Carbon::parse($play->when)->format('D d M') }}
                        </div>

                        <span class="bg-gold/10 text-gold px-4 py-1 rounded-full text-sm font-semibold group-hover:bg-gold group-hover:text-onyx transition">
                            {{ \Carbon\Carbon::parse($play->when)->format('H:i') }}
                        </span>
                    </div>

                    <!-- Cinema -->
                    <div class="flex items-center gap-3 text-silver group-hover:text-onyx transition">
                        <span class="text-xl">🎥</span>
                        <span class="font-medium">
                            {{ $play->cinema->cinemaName }}
                        </span>
                    </div>

                    <!-- CTA -->
                    <div class="mt-6 text-right">
                        <span class="inline-flex items-center gap-2 text-gold font-semibold group-hover:text-onyx transition">
                            Select seats →
                        </span>
                    </div>
                </a>
            @endforeach
        </div>

        <!-- Empty state -->
        @if ($plays->isEmpty())
            <div class="text-center text-silver mt-12">
                No showtimes available for this movie.
            </div>
        @endif

    </section>
</x-layout>

<x-layout title="ONYX Cinema - Premium Movie Experience">

    <!-- Hero Section -->
    <section class="relative h-screen flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-b from-onyx/60 via-onyx/80 to-onyx"></div>

        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-1/4 left-1/4 w-64 h-64 bg-gold rounded-full blur-3xl"></div>
            <div class="absolute bottom-1/4 right-1/4 w-96 h-96 bg-cyan rounded-full blur-3xl"></div>
        </div>

        <div class="relative z-10 text-center px-6 max-w-4xl animate-fadeInUp">
            <h1 class="font-display text-5xl md:text-7xl font-bold text-gold mb-6">
                Experience Cinema Redefined
            </h1>
            <p class="text-xl md:text-2xl text-silver mb-10">
                Immerse yourself in luxury. Where every frame tells a story.
            </p>
        </div>
    </section>

    <!-- Now Showing -->
    <section class="py-20 px-6 lg:px-12">
        <div class="container mx-auto">
            <h2 class="font-display text-4xl md:text-5xl text-center text-gold mb-16">
                Now Showing
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach ($movies as $movie)
                    <div class="bg-charcoal rounded-2xl overflow-hidden shadow-lg hover:-translate-y-3 transition-all duration-300 group">

                        <!-- Image -->
                        <div class="h-96 relative overflow-hidden bg-charcoal">
                            @if ($movie->image)
                                <img
                                    src="{{ $movie->image }}"
                                    alt="{{ $movie->movieName }}"
                                    class="w-full h-full object-cover"
                                >
                            @else
                                <div class="w-full h-full flex items-center justify-center text-6xl opacity-20">
                                    🎬
                                </div>
                            @endif

                            <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 flex items-center justify-center transition">
                                ▶️
                            </div>
                        </div>

                        <!-- Info -->
                        <div class="p-6">
                            <h3 class="text-xl font-semibold text-soft-white mb-2">
                                {{ $movie->movieName }}
                            </h3>

                            <p class="text-silver text-sm mb-2">
                                {{ optional($movie->genres->first())->name ?? 'Unknown genre' }}
                                • {{ \Carbon\Carbon::parse($movie->duration)->format('H\h i\m') }}
                                • {{ $movie->ageRequirement }}
                            </p>

                            <p class="text-gold font-semibold mb-4">
                                €{{ number_format($movie->price, 2) }}
                            </p>

                            <a
                                href="{{ route('tickets.choosePlay', $movie->movieId) }}"
                                class="block text-center bg-gold text-onyx py-3 rounded-lg font-semibold hover:bg-cyan transition"
                            >
                                Book Tickets
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="text-center mt-12">
                <a href="{{ route('movies.index') }}"
                   class="inline-block border-2 border-gold text-gold px-8 py-3 rounded-full hover:bg-gold hover:text-onyx transition">
                    View All Movies
                </a>
            </div>
        </div>
    </section>

</x-layout>

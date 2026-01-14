{{-- resources/views/movies/index.blade.php --}}
<x-layout title="Movies - ONYX Cinema">

    <!-- Hero Section -->
    <section class="relative h-96 flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-b from-onyx/60 via-onyx/80 to-onyx"></div>
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-1/3 left-1/3 w-64 h-64 bg-gold rounded-full blur-3xl"></div>
            <div class="absolute bottom-1/3 right-1/3 w-96 h-96 bg-cyan rounded-full blur-3xl"></div>
        </div>

        <div class="relative z-10 text-center px-6 animate-fadeInUp">
            <h1 class="font-display text-5xl md:text-6xl font-bold text-gold mb-4 drop-shadow-[0_0_30px_rgba(212,175,55,0.5)]">
                Now Showing
            </h1>
            <p class="text-xl text-silver">Discover the magic on the big screen</p>
        </div>
    </section>

    <!-- Movies Grid -->
    <section class="py-16 px-6 lg:px-12">
        <div class="container mx-auto">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                
                @forelse($movies as $movie)
                    <!-- Movie Card -->
                    <div class="bg-charcoal rounded-2xl overflow-hidden shadow-lg hover:-translate-y-3 hover:shadow-[0_15px_40px_rgba(0,229,255,0.3)] transition-all duration-300 cursor-pointer group">
                        <!-- Movie Poster -->
                        <div class="h-96 flex items-center justify-center relative overflow-hidden bg-gradient-to-br from-charcoal via-gold/20 to-gold">
                            @if(!empty($movie->image))
                                <img src="{{ asset('storage/' . $movie->image) }}" alt="{{ $movie->movieName }}" class="w-full h-96 object-cover" />
                            @else
                                <div class="w-full h-full flex items-center justify-center">
                                    <span class="text-8xl opacity-20">🎬</span>
                                </div>
                            @endif

                            <!-- Play Overlay -->
                            <div class="absolute inset-0 bg-black/60 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                                <div class="text-center">
                                    <span class="text-cyan text-5xl mb-2 block">▶️</span>
                                    <span class="text-soft-white text-sm">Watch Trailer</span>
                                </div>
                            </div>

                            <!-- Age Rating Badge -->
                            <div class="absolute top-4 right-4 bg-gold text-onyx px-3 py-1 rounded-lg text-sm font-bold">
                                {{ $movie->ageRequirement }}
                            </div>
                        </div>

                        <!-- Movie Info -->
                        <div class="p-6">
                            <h3 class="text-xl font-semibold text-soft-white mb-2 line-clamp-1">
                                {{ $movie->movieName }}
                            </h3>
                            
                            <div class="flex items-center gap-2 text-silver text-sm mb-1">
                                <span>🎭</span>
                                <span>{{ $movie->genre->genreName }}</span>
                            </div>
                            
                            <div class="flex items-center gap-2 text-silver text-sm mb-4">
                                <span>⏱️</span>
                                <span>{{ \Carbon\Carbon::parse($movie->duration)->format('H\h i\m') }}</span>
                            </div>

                            <!-- Action Buttons -->
                            <div class="flex gap-2">
                                <a href="#" class="flex-1 bg-gold text-onyx py-3 rounded-lg font-semibold text-center hover:bg-cyan hover:scale-105 transition-all duration-300">
                                    Book Now
                                </a>
                                <a href="{{ route('movies.show', $movie->movieId) }}" class="px-4 py-3 border-2 border-gold text-gold rounded-lg hover:bg-gold hover:text-onyx transition-all duration-300 flex items-center gap-2">
                                    <span>ℹ️</span>
                                    <span>Details</span>
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <!-- No Movies Found -->
                    <div class="col-span-full text-center py-20">
                        <div class="text-8xl mb-6 opacity-30">🎬</div>
                        <h3 class="text-2xl font-display text-gold mb-4">No Movies Found</h3>
                        <p class="text-silver">Check back soon for new releases!</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

</x-layout>
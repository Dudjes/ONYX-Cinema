<x-layout title="Movies - ONYX Cinema">

    <!-- Hero Section -->
    <section class="relative h-96 flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-b from-onyx/60 via-onyx/80 to-onyx"></div>
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-1/3 left-1/3 w-64 h-64 bg-gold rounded-full blur-3xl"></div>
            <div class="absolute bottom-1/3 right-1/3 w-96 h-96 bg-cyan rounded-full blur-3xl"></div>
        </div>

        <div class="relative z-10 text-center px-6 animate-fadeInUp">
            <h1
                class="font-display text-5xl md:text-6xl font-bold text-gold mb-4 drop-shadow-[0_0_30px_rgba(212,175,55,0.5)]">
                Now Showing
            </h1>
            <p class="text-xl text-silver">Discover the magic on the big screen</p>
        </div>
    </section>

    <!-- Filters Section & Movies Grid -->
    <section class="py-16 px-6 lg:px-12">
        <div class="container mx-auto">
            <div class="flex flex-col lg:flex-row gap-8">
                
                <!-- Sidebar Filters -->
                <aside class="lg:w-80 flex-shrink-0">
                    <div class="bg-charcoal rounded-2xl p-6 sticky top-6">
                        <form method="GET" action="{{ route('movies.index') }}" class="space-y-6">
                            
                            <!-- Filter Header -->
                            <div class="flex items-center justify-between pb-4 border-b border-gold/20">
                                <h3 class="text-xl font-semibold text-gold">🔍 Filters</h3>
                                <a href="{{ route('movies.index') }}" class="text-sm text-silver hover:text-gold transition-colors">
                                    Clear
                                </a>
                            </div>

                            <!-- Genre Filter -->
                            <div>
                                <label class="block text-sm font-semibold text-soft-white mb-3">Genre</label>
                                <select name="genre" class="w-full bg-onyx border border-charcoal text-soft-white px-4 py-2.5 rounded-lg focus:border-gold focus:outline-none transition-colors">
                                    <option value="">All Genres</option>
                                    @foreach($genres as $genre)
                                        <option value="{{ $genre->genreId }}" {{ request('genre') == $genre->genreId ? 'selected' : '' }}>
                                            {{ $genre->genreName }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Cinema Filter -->
                            <div>
                                <label class="block text-sm font-semibold text-soft-white mb-3">Cinema</label>
                                <select name="cinema" class="w-full bg-onyx border border-charcoal text-soft-white px-4 py-2.5 rounded-lg focus:border-gold focus:outline-none transition-colors">
                                    <option value="">All Cinemas</option>
                                    @foreach($cinemas as $cinema)
                                        <option value="{{ $cinema->cinemaId }}" {{ request('cinema') == $cinema->cinemaId ? 'selected' : '' }}>
                                            {{ $cinema->cinemaName }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Age Requirement Filter -->
                            <div>
                                <label class="block text-sm font-semibold text-soft-white mb-3">Age Rating</label>
                                <select name="age" class="w-full bg-onyx border border-charcoal text-soft-white px-4 py-2.5 rounded-lg focus:border-gold focus:outline-none transition-colors">
                                    <option value="">All Ages</option>
                                    <option value="0" {{ request('age') == '0' ? 'selected' : '' }}>All Ages (0+)</option>
                                    <option value="12" {{ request('age') == '12' ? 'selected' : '' }}>12+</option>
                                    <option value="16" {{ request('age') == '16' ? 'selected' : '' }}>16+</option>
                                    <option value="18" {{ request('age') == '18' ? 'selected' : '' }}>18+</option>
                                </select>
                            </div>

                            <!-- Price Range -->
                            <div>
                                <label class="block text-sm font-semibold text-soft-white mb-3">Price Range ($)</label>
                                <div class="space-y-3">
                                    <input type="number" name="min_price" value="{{ request('min_price') }}" 
                                        step="0.01" min="0" 
                                        placeholder="Min: 0.00"
                                        class="w-full bg-onyx border border-charcoal text-soft-white px-4 py-2.5 rounded-lg focus:border-gold focus:outline-none transition-colors">
                                    <input type="number" name="max_price" value="{{ request('max_price') }}" 
                                        step="0.01" min="0" 
                                        placeholder="Max: 50.00"
                                        class="w-full bg-onyx border border-charcoal text-soft-white px-4 py-2.5 rounded-lg focus:border-gold focus:outline-none transition-colors">
                                </div>
                            </div>

                            <!-- Sort By -->
                            <div>
                                <label class="block text-sm font-semibold text-soft-white mb-3">Sort By</label>
                                <select name="sort" class="w-full bg-onyx border border-charcoal text-soft-white px-4 py-2.5 rounded-lg focus:border-gold focus:outline-none transition-colors">
                                    <option value="movieName" {{ request('sort') == 'movieName' ? 'selected' : '' }}>Name (A-Z)</option>
                                    <option value="price" {{ request('sort') == 'price' ? 'selected' : '' }}>Price (Low-High)</option>
                                    <option value="duration" {{ request('sort') == 'duration' ? 'selected' : '' }}>Duration</option>
                                    <option value="age" {{ request('sort') == 'age' ? 'selected' : '' }}>Age Rating</option>
                                </select>
                            </div>

                            <!-- Apply Button -->
                            <button type="submit" class="w-full bg-gold text-onyx py-3 rounded-lg font-semibold hover:bg-cyan hover:scale-105 transition-all duration-300">
                                Apply Filters
                            </button>

                        </form>
                    </div>
                </aside>

                <!-- Movies Grid -->
                <div class="flex-1">
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">

                @forelse($movies as $movie)
                    <!-- Movie Card -->
                    <div
                        class="bg-charcoal rounded-2xl overflow-hidden shadow-lg hover:-translate-y-3 hover:shadow-[0_15px_40px_rgba(0,229,255,0.3)] transition-all duration-300 cursor-pointer group">
                        <!-- Movie Poster -->
                        <div
                            class="h-96 flex items-center justify-center relative overflow-hidden bg-gradient-to-br from-charcoal via-gold/20 to-gold">
                            @if (!empty($movie->image))
                                @php
                                    $src = \Illuminate\Support\Str::startsWith($movie->image, [
                                        'http://',
                                        'https://',
                                        '//',
                                    ])
                                        ? $movie->image
                                        : asset('storage/' . $movie->image);
                                @endphp
                                <img src="{{ $src }}" alt="{{ $movie->movieName }}"
                                    class="w-full h-96 object-cover" />
                            @else
                                <div class="w-full h-full flex items-center justify-center">
                                    <span class="text-8xl opacity-20">🎬</span>
                                </div>
                            @endif

                            <!-- Play Overlay -->
                            <div
                                class="absolute inset-0 bg-black/60 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                                <div class="text-center">
                                    <span class="text-cyan text-5xl mb-2 block">▶️</span>
                                    <span class="text-soft-white text-sm">Watch Trailer</span>
                                </div>
                            </div>

                            <!-- Age Rating Badge -->
                            <div
                                class="absolute top-4 right-4 bg-gold text-onyx px-3 py-1 rounded-lg text-sm font-bold">
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
                                <span>{{ $movie->genres->pluck('genreName')->join(', ') }}</span>
                            </div>

                            <div class="flex items-center gap-2 text-silver text-sm mb-4">
                                <span>⏱️</span>
                                <span>{{ \Carbon\Carbon::parse($movie->duration)->format('H\h i\m') }}</span>
                                @if (!empty($movie->price))
                                    <span class="ml-3">• <span
                                            class="text-gold font-semibold">${{ number_format($movie->price, 2) }}</span></span>
                                @endif
                            </div>

                            <!-- Action Buttons -->
                            <div class="flex gap-2">
                                <a href="{{ route('tickets.choosePlay', $movie) }}"
                                    class="flex-1 bg-gold text-onyx py-3 rounded-lg font-semibold text-center hover:bg-cyan hover:scale-105 transition-all duration-300">
                                    Book Now
                                </a>
                                <a href="{{ route('movies.show', $movie->movieId) }}"
                                    class="px-4 py-3 border-2 border-gold text-gold rounded-lg hover:bg-gold hover:text-onyx transition-all duration-300 flex items-center gap-2">
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

            </div>
        </div>
    </section>

</x-layout><!-- Add this section right after the Hero Section and before the Movies Grid -->
<section class="py-8 px-6 lg:px-12 bg-charcoal/50">
    <div class="container mx-auto">
        <form method="GET" action="{{ route('movies.index') }}" class="space-y-4">
            
            <!-- Filter Header -->
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-xl font-semibold text-gold">🔍 Filter Movies</h3>
                <a href="{{ route('movies.index') }}" class="text-sm text-silver hover:text-gold transition-colors">
                    Clear Filters
                </a>
            </div>

            <!-- Filters Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                
                <!-- Genre Filter -->
                <div>
                    <label class="block text-sm text-silver mb-2">Genre</label>
                    <select name="genre" class="w-full bg-onyx border border-charcoal text-soft-white px-4 py-2 rounded-lg focus:border-gold focus:outline-none">
                        <option value="">All Genres</option>
                        @foreach($genres as $genre)
                            <option value="{{ $genre->genreId }}" {{ request('genre') == $genre->genreId ? 'selected' : '' }}>
                                {{ $genre->genreName }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Cinema Filter -->
                <div>
                    <label class="block text-sm text-silver mb-2">Cinema</label>
                    <select name="cinema" class="w-full bg-onyx border border-charcoal text-soft-white px-4 py-2 rounded-lg focus:border-gold focus:outline-none">
                        <option value="">All Cinemas</option>
                        @foreach($cinemas as $cinema)
                            <option value="{{ $cinema->cinemaId }}" {{ request('cinema') == $cinema->cinemaId ? 'selected' : '' }}>
                                {{ $cinema->cinemaName }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Age Requirement Filter -->
                <div>
                    <label class="block text-sm text-silver mb-2">Max Age Rating</label>
                    <select name="age" class="w-full bg-onyx border border-charcoal text-soft-white px-4 py-2 rounded-lg focus:border-gold focus:outline-none">
                        <option value="">All Ages</option>
                        <option value="0" {{ request('age') == '0' ? 'selected' : '' }}>All Ages (0+)</option>
                        <option value="12" {{ request('age') == '12' ? 'selected' : '' }}>12+</option>
                        <option value="16" {{ request('age') == '16' ? 'selected' : '' }}>16+</option>
                        <option value="18" {{ request('age') == '18' ? 'selected' : '' }}>18+</option>
                    </select>
                </div>

                <!-- Sort By -->
                <div>
                    <label class="block text-sm text-silver mb-2">Sort By</label>
                    <select name="sort" class="w-full bg-onyx border border-charcoal text-soft-white px-4 py-2 rounded-lg focus:border-gold focus:outline-none">
                        <option value="movieName" {{ request('sort') == 'movieName' ? 'selected' : '' }}>Name</option>
                        <option value="price" {{ request('sort') == 'price' ? 'selected' : '' }}>Price</option>
                        <option value="duration" {{ request('sort') == 'duration' ? 'selected' : '' }}>Duration</option>
                        <option value="age" {{ request('sort') == 'age' ? 'selected' : '' }}>Age Rating</option>
                    </select>
                </div>

            </div>

            <!-- Price Range -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm text-silver mb-2">Min Price ($)</label>
                    <input type="number" name="min_price" value="{{ request('min_price') }}" 
                        step="0.01" min="0" 
                        placeholder="0.00"
                        class="w-full bg-onyx border border-charcoal text-soft-white px-4 py-2 rounded-lg focus:border-gold focus:outline-none">
                </div>
                <div>
                    <label class="block text-sm text-silver mb-2">Max Price ($)</label>
                    <input type="number" name="max_price" value="{{ request('max_price') }}" 
                        step="0.01" min="0" 
                        placeholder="50.00"
                        class="w-full bg-onyx border border-charcoal text-soft-white px-4 py-2 rounded-lg focus:border-gold focus:outline-none">
                </div>
            </div>

            <!-- Apply Button -->
            <div class="flex justify-end">
                <button type="submit" class="bg-gold text-onyx px-8 py-3 rounded-lg font-semibold hover:bg-cyan hover:scale-105 transition-all duration-300">
                    Apply Filters
                </button>
            </div>

        </form>
    </div>
</section>
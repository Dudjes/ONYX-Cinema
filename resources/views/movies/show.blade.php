{{-- resources/views/movies/show.blade.php --}} 
<x-layout :title="$movie->movieName">

    <section class="py-16 px-6 lg:px-12">
        <div class="container mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <div class="lg:col-span-1">
                    <div class="bg-charcoal rounded-2xl overflow-hidden shadow-lg">
                        @if(!empty($movie->image))
                            <img src="{{ asset('storage/' . $movie->image) }}" alt="{{ $movie->movieName }}" class="w-full h-96 object-cover" />
                        @else
                            <div class="w-full h-96 flex items-center justify-center bg-gradient-to-br from-charcoal via-gold/20 to-gold">
                                <span class="text-8xl opacity-20">🎬</span>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="lg:col-span-2">
                    <h1 class="text-4xl font-display text-gold font-bold mb-4">{{ $movie->movieName }}</h1>

                    <div class="flex items-center gap-4 text-silver mb-6">
                        <div class="px-3 py-1 bg-gold text-onyx rounded-md">{{ $movie->ageRequirement }}</div>
                        <div class="flex items-center gap-2">🎭 <span>{{ $movie->genre->genreName }}</span></div>
                        <div class="flex items-center gap-2">⏱️ <span>{{ \Carbon\Carbon::parse($movie->duration)->format('H\h i\m') }}</span></div>
                    </div>

                    <div class="prose prose-invert text-silver mb-8">
                        {!! nl2br(e($movie->description)) !!}
                    </div>

                    <div class="flex gap-4">
                        <a href="#" class="bg-gold text-onyx px-6 py-3 rounded-lg font-semibold">Book Tickets</a>
                        <a href="{{ route('movies.index') }}" class="border border-gold text-gold px-6 py-3 rounded-lg">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-layout>

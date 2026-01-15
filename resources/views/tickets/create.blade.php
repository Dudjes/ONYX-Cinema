<x-layout title="Choose Movie">
    <section class="p-8 max-w-5xl mx-auto">
        <h2 class="text-3xl text-gold mb-8">Choose a movie</h2>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            @foreach ($movies as $movie)
                <a href="{{ route('tickets.choosePlay', $movie) }}"
                   class="bg-charcoal rounded-xl p-4 hover:ring-2 ring-gold transition">
                    <img src="{{ $movie->image }}"
                         class="h-48 w-full object-cover rounded mb-3">
                    <div class="text-gold text-center font-semibold">
                        {{ $movie->movieName }}
                    </div>
                </a>
            @endforeach
        </div>
    </section>
</x-layout>

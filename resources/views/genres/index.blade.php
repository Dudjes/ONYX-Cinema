<x-layout title="Genres">
    <section class="p-8">
        <h2 class="text-2xl text-gold mb-4">Genres</h2>
        <a href="{{ route('genres.create') }}" class="bg-gold px-3 py-2 rounded">Create Genre</a>
        <div class="mt-4">
            <ul>
                @foreach ($genres as $g)
                    <li class="py-2 border-b">{{ $g->genreName }}
                        <a href="{{ route('genres.show', $g) }}" class="ml-2 text-gold">View</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </section>
</x-layout>

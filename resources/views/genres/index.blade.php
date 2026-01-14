<x-layout title="Genres">
    <section class="p-8">
        <h2 class="text-2xl text-gold mb-4">Genres</h2>
        <a href="{{ route('genres.create') }}" class="bg-gold px-3 py-2 rounded">Create Genre</a>
        <div class="mt-4">
            <ul>
                @foreach ($genres as $g)
                    <li class="py-2 border-b">{{ $g->genreName }}
                        <a href="{{ route('genres.show', $g) }}" class="ml-2 text-gold">Detail</a>
                        <a href="{{ route('genres.edit', $g) }}" class="ml-2 text-green-500">Edit</a>
                        <form action="{{ route('genres.destroy', $g) }}" method="POST" class="inline-block ml-2">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500"
                                onclick="return confirm('Delete this genre?')">Delete</button>
                        </form>
                    </li>
                @endforeach
            </ul>
        </div>
    </section>
</x-layout>

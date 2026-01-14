<x-layout :title="$genre->genreName">
    <section class="p-8">
        <h2 class="text-2xl text-gold">{{ $genre->genreName }}</h2>
        <a href="{{ route('genres.edit', $genre) }}" class="text-gold">Edit</a>
    </section>
</x-layout>

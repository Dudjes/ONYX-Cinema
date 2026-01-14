<x-layout :title="$play->movie->movieName ?? 'Play'">
    <section class="p-8">
        <h2 class="text-2xl text-gold">{{ $play->movie->movieName ?? 'Play' }}</h2>
        <p class="text-silver">When: {{ $play->when }}</p>
        <p class="text-silver">Hall: {{ $play->hall->hallNumber ?? '—' }}</p>
        <a href="{{ route('plays.edit', $play) }}" class="text-gold">Edit</a>
    </section>
</x-layout>

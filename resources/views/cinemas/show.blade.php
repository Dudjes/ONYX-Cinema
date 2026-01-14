<x-layout :title="$cinema->cinemaName">
    <section class="p-8">
        <h2 class="text-2xl text-gold">{{ $cinema->cinemaName }}</h2>
        <p class="text-silver">{{ $cinema->adress }}</p>
        <a href="{{ route('cinemas.edit', $cinema) }}" class="text-gold">Edit</a>
    </section>
</x-layout>

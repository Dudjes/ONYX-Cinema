<x-layout title="Cinemas">
    <section class="p-8">
        <h2 class="text-2xl text-gold mb-4">Cinemas</h2>
        <a href="{{ route('cinemas.create') }}" class="bg-gold px-3 py-2 rounded">Create Cinema</a>
        <div class="mt-4">
            <ul>
                @foreach ($cinemas as $c)
                    <li class="py-2 border-b">{{ $c->cinemaName }} — {{ $c->adress }}
                        <a href="{{ route('cinemas.show', $c) }}" class="ml-2 text-gold">View</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </section>
</x-layout>

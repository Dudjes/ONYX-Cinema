<x-layout :title="$movie->movieName">
    <section class="p-8 max-w-3xl mx-auto">
        <h2 class="text-2xl text-gold mb-6">
            {{ $movie->movieName }} – Choose a time
        </h2>

        <div class="space-y-4">
            @foreach ($plays as $play)
                <a href="{{ route('tickets.chooseSeat', [$movie, $play]) }}"
                   class="block bg-charcoal p-4 rounded-lg hover:bg-gold hover:text-onyx transition">
                    <div class="font-semibold">
                        {{ \Carbon\Carbon::parse($play->when)->format('D d M – H:i') }}
                    </div>
                    <div class="text-sm opacity-70">
                        {{ $play->cinema->cinemaName }}
                    </div>
                </a>
            @endforeach
        </div>
    </section>
</x-layout>

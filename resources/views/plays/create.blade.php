<x-layout title="Create Play">
    <section class="p-8">
        <h2 class="text-2xl text-gold mb-4">Create Play</h2>
        <form action="{{ route('plays.store') }}" method="POST">
            @csrf
            <div>
                <label>Movie</label>
                <select name="movieId">
                    @foreach ($movies as $m)
                        <option value="{{ $m->movieId }}">{{ $m->movieName }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label>Hall</label>
                <select name="hallId">
                    @foreach ($halls as $h)
                        <option value="{{ $h->hallId }}">Hall {{ $h->hallNumber }}
                            ({{ $h->cinema->cinemaName ?? '' }})</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label>Cinema</label>
                <select name="cinemaId">
                    @foreach ($cinemas as $c)
                        <option value="{{ $c->cinemaId }}">{{ $c->cinemaName }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label>When</label>
                <input type="datetime-local" name="when" />
            </div>
            <button class="bg-gold px-3 py-2 mt-3">Create</button>
        </form>
    </section>
</x-layout>

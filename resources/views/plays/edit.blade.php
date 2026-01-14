<x-layout title="Edit Play">
    <section class="p-8">
        <h2 class="text-2xl text-gold mb-4">Edit Play</h2>
        <form action="{{ route('plays.update', $play) }}" method="POST">
            @csrf
            @method('PUT')
            <div>
                <label>Movie</label>
                <select name="movieId">
                    @foreach ($movies as $m)
                        <option value="{{ $m->movieId }}"
                            {{ $m->movieId == old('movieId', $play->movieId) ? 'selected' : '' }}>{{ $m->movieName }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div>
                <label>Hall</label>
                <select name="hallId">
                    @foreach ($halls as $h)
                        <option value="{{ $h->hallId }}"
                            {{ $h->hallId == old('hallId', $play->hallId) ? 'selected' : '' }}>Hall {{ $h->hallNumber }}
                            ({{ $h->cinema->cinemaName ?? '' }})</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label>Cinema</label>
                <select name="cinemaId">
                    @foreach ($cinemas as $c)
                        <option value="{{ $c->cinemaId }}"
                            {{ $c->cinemaId == old('cinemaId', $play->cinemaId) ? 'selected' : '' }}>
                            {{ $c->cinemaName }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label>When</label>
                <input type="datetime-local" name="when"
                    value="{{ old('when', \Carbon\Carbon::parse($play->when)->format('Y-m-d\TH:i')) }}" />
            </div>
            <button class="bg-gold px-3 py-2 mt-3">Save</button>
        </form>
    </section>
</x-layout>

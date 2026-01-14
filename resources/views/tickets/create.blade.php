<x-layout title="Create Ticket">
    <section class="p-8">
        <h2 class="text-2xl text-gold mb-4">Create Ticket</h2>
        <form action="{{ route('tickets.store') }}" method="POST">
            @csrf
            <div>
                <label>Seat</label>
                <input name="seat" />
            </div>
            <div>
                <label>Play</label>
                <select name="playId">
                    @foreach ($plays as $p)
                        <option value="{{ $p->playId }}">{{ $p->movie->movieName ?? '' }} — {{ $p->when }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div>
                <label>User</label>
                <select name="userId">
                    @foreach ($users as $u)
                        <option value="{{ $u->id }}">{{ $u->firstname ?? $u->name }} {{ $u->lastname ?? '' }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div>
                <label>Sold?</label>
                <select name="isSold">
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </select>
            </div>
            <button class="bg-gold px-3 py-2 mt-3">Create</button>
        </form>
    </section>
</x-layout>

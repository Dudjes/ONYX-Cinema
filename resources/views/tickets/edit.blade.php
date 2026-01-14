<x-layout title="Edit Ticket">
    <section class="p-8">
        <h2 class="text-2xl text-gold mb-4">Edit Ticket</h2>
        <form action="{{ route('tickets.update', $ticket) }}" method="POST">
            @csrf
            @method('PUT')
            <div>
                <label>Seat</label>
                <input name="seat" value="{{ old('seat', $ticket->seat) }}" />
            </div>
            <div>
                <label>Play</label>
                <select name="playId">
                    @foreach ($plays as $p)
                        <option value="{{ $p->playId }}"
                            {{ $p->playId == old('playId', $ticket->playId) ? 'selected' : '' }}>
                            {{ $p->movie->movieName ?? '' }} — {{ $p->when }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label>User</label>
                <select name="userId">
                    @foreach ($users as $u)
                        <option value="{{ $u->id }}"
                            {{ $u->id == old('userId', $ticket->userId) ? 'selected' : '' }}>
                            {{ $u->firstname ?? $u->name }} {{ $u->lastname ?? '' }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label>Sold?</label>
                <select name="isSold">
                    <option value="1" {{ old('isSold', $ticket->isSold) ? 'selected' : '' }}>Yes</option>
                    <option value="0" {{ !old('isSold', $ticket->isSold) ? 'selected' : '' }}>No</option>
                </select>
            </div>
            <button class="bg-gold px-3 py-2 mt-3">Save</button>
        </form>
    </section>
</x-layout>

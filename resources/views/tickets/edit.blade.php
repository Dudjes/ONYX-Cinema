<x-layout title="Edit Ticket">
    <section class="py-16 px-6 lg:px-12 max-w-3xl mx-auto">
        <h2 class="text-3xl font-display text-gold font-bold mb-8">Edit Ticket</h2>

        <form action="{{ route('tickets.update', $ticket) }}" method="POST" class="bg-charcoal p-8 rounded-2xl shadow-xl border border-gold/20 space-y-6">
            @csrf
            @method('PUT')

            {{-- Seat --}}
            <div>
                <label class="block text-silver font-semibold mb-1">Seat</label>
                <input 
                    type="text" 
                    name="seat" 
                    value="{{ old('seat', $ticket->seat) }}" 
                    class="w-full px-4 py-2 rounded-md border border-gold/50 bg-onyx text-white focus:outline-none focus:ring-2 focus:ring-gold" 
                    required
                />
            </div>

            {{-- Play --}}
            <div>
                <label class="block text-silver font-semibold mb-1">Play</label>
                <select name="playId" class="w-full px-4 py-2 rounded-md border border-gold/50 bg-onyx text-white focus:outline-none focus:ring-2 focus:ring-gold" required>
                    @foreach ($plays as $p)
                        <option value="{{ $p->playId }}" {{ $p->playId == old('playId', $ticket->playId) ? 'selected' : '' }}>
                            {{ $p->movie->movieName ?? '' }} — {{ \Carbon\Carbon::parse($p->when)->format('D d M Y – H:i') }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- User --}}
            <div>
                <label class="block text-silver font-semibold mb-1">User</label>
                <select name="userId" class="w-full px-4 py-2 rounded-md border border-gold/50 bg-onyx text-white focus:outline-none focus:ring-2 focus:ring-gold" required>
                    @foreach ($users as $u)
                        <option value="{{ $u->id }}" {{ $u->id == old('userId', $ticket->userId) ? 'selected' : '' }}>
                            {{ $u->firstname ?? $u->name }} {{ $u->lastname ?? '' }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Sold --}}
            <div>
                <label class="block text-silver font-semibold mb-1">Sold?</label>
                <select name="isSold" class="w-full px-4 py-2 rounded-md border border-gold/50 bg-onyx text-white focus:outline-none focus:ring-2 focus:ring-gold">
                    <option value="1" {{ old('isSold', $ticket->isSold) ? 'selected' : '' }}>Yes</option>
                    <option value="0" {{ !old('isSold', $ticket->isSold) ? 'selected' : '' }}>No</option>
                </select>
            </div>

            {{-- Save Button --}}
            <div>
                <button type="submit" class="bg-gold text-onyx px-6 py-3 rounded-xl font-semibold hover:bg-yellow-500 transition-all shadow-lg">
                    Save Changes
                </button>
            </div>
        </form>
    </section>
</x-layout>

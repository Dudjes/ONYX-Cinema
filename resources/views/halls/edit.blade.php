<x-layout title="Edit Hall">
    <section class="py-16 px-6 lg:px-12 max-w-3xl mx-auto">
        <h2 class="text-3xl font-display text-gold font-bold mb-8">Edit Hall</h2>

        <form action="{{ route('halls.update', $hall) }}" method="POST" class="bg-charcoal p-8 rounded-2xl shadow-xl border border-gold/20 space-y-6">
            @csrf
            @method('PUT')

            {{-- Hall Number --}}
            <div>
                <label class="block text-silver font-semibold mb-1">Hall Number</label>
                <input 
                    name="hallNumber" 
                    value="{{ old('hallNumber', $hall->hallNumber) }}" 
                    class="w-full px-4 py-2 rounded-md border border-gold/50 bg-onyx text-white focus:outline-none focus:ring-2 focus:ring-gold"
                    required
                />
            </div>

            {{-- Capacity --}}
            <div>
                <label class="block text-silver font-semibold mb-1">Capacity</label>
                <input 
                    type="number"
                    name="capacity" 
                    value="{{ old('capacity', $hall->capacity) }}" 
                    class="w-full px-4 py-2 rounded-md border border-gold/50 bg-onyx text-white focus:outline-none focus:ring-2 focus:ring-gold"
                    required
                />
            </div>

            {{-- Cinema --}}
            <div>
                <label class="block text-silver font-semibold mb-1">Cinema</label>
                <select 
                    name="cinemaId" 
                    class="w-full px-4 py-2 rounded-md border border-gold/50 bg-onyx text-white focus:outline-none focus:ring-2 focus:ring-gold"
                    required
                >
                    @foreach ($cinemas as $c)
                        <option value="{{ $c->cinemaId }}" {{ $c->cinemaId == old('cinemaId', $hall->cinemaId) ? 'selected' : '' }}>
                            {{ $c->cinemaName }}
                        </option>
                    @endforeach
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

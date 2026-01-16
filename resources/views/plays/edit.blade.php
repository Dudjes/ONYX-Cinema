<x-layout title="Edit Play">
    <section class="py-16 px-6 lg:px-12 max-w-3xl mx-auto">
        <h2 class="text-3xl font-display text-gold font-bold mb-8">Edit Play</h2>

        <form action="{{ route('plays.update', $play) }}" method="POST" class="bg-charcoal p-8 rounded-2xl shadow-xl border border-gold/20 space-y-6">
            @csrf
            @method('PUT')

            {{-- Movie --}}
            <div>
                <label class="block text-silver font-semibold mb-1">Movie</label>
                <select name="movieId" class="w-full px-4 py-2 rounded-md border border-gold/50 bg-onyx text-white focus:outline-none focus:ring-2 focus:ring-gold" required>
                    @foreach ($movies as $m)
                        <option value="{{ $m->movieId }}" {{ $m->movieId == old('movieId', $play->movieId) ? 'selected' : '' }}>
                            {{ $m->movieName }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Hall --}}
            <div>
                <label class="block text-silver font-semibold mb-1">Hall</label>
                <select name="hallId" id="hallSelect" class="w-full px-4 py-2 rounded-md border border-gold/50 bg-onyx text-white focus:outline-none focus:ring-2 focus:ring-gold" required>
                    @foreach ($halls as $h)
                        <option value="{{ $h->hallId }}" 
                            data-cinema="{{ $h->cinema->cinemaName ?? '' }}"
                            {{ $h->hallId == old('hallId', $play->hallId) ? 'selected' : '' }}>
                            Hall {{ $h->hallNumber }} ({{ $h->cinema->cinemaName ?? '' }})
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Cinema (readonly) --}}
            <div>
                <label class="block text-silver font-semibold mb-1">Cinema</label>
                <input type="text" id="cinemaDisplay" value="{{ $play->hall->cinema->cinemaName ?? '' }}" class="w-full px-4 py-2 rounded-md border border-gold/50 bg-onyx text-white focus:outline-none" readonly>
            </div>

            {{-- Date & Time --}}
            <div>
                <label class="block text-silver font-semibold mb-1">When</label>
                <input 
                    type="datetime-local" 
                    name="when"
                    value="{{ old('when', \Carbon\Carbon::parse($play->when)->format('Y-m-d\TH:i')) }}"
                    class="w-full px-4 py-2 rounded-md border border-gold/50 bg-onyx text-white focus:outline-none focus:ring-2 focus:ring-gold"
                    required
                />
            </div>

            {{-- Save Button --}}
            <div>
                <button type="submit" class="bg-gold text-onyx px-6 py-3 rounded-xl font-semibold hover:bg-yellow-500 transition-all shadow-lg">
                    Save Changes
                </button>
            </div>
        </form>
    </section>

    <script>
        // Update Cinema input when Hall changes
        const hallSelect = document.getElementById('hallSelect');
        const cinemaDisplay = document.getElementById('cinemaDisplay');

        hallSelect.addEventListener('change', function() {
            const selectedOption = hallSelect.options[hallSelect.selectedIndex];
            cinemaDisplay.value = selectedOption.dataset.cinema;
        });
    </script>
</x-layout>

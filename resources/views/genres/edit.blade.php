<x-layout title="Edit Genre">
    <section class="py-16 px-6 lg:px-12 max-w-3xl mx-auto">
        <h2 class="text-3xl font-display text-gold font-bold mb-8">Edit Genre</h2>

        <form action="{{ route('genres.update', $genre) }}" method="POST" class="bg-charcoal p-8 rounded-2xl shadow-xl border border-gold/20 space-y-6">
            @csrf
            @method('PUT')

            {{-- Genre Name --}}
            <div>
                <label class="block text-silver font-semibold mb-1">Genre Name</label>
                <input 
                    name="genreName" 
                    value="{{ old('genreName', $genre->genreName) }}" 
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
</x-layout>

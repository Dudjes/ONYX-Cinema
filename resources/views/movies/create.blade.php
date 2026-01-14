<x-layout title="Create Movie - ONYX Cinema">

    <section class="py-8 px-4 max-w-2xl mx-auto">
        <h2 class="text-2xl font-semibold mb-6 text-gold">Add New Movie</h2>

        <form action="{{ route('movies.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf

            <div>
                <label class="block text-sm text-silver mb-1">Movie Title</label>
                <input type="text" name="movieName" value="{{ old('movieName') }}"
                    class="w-full px-3 py-2 rounded border border-gold/20 bg-onyx text-soft-white">
                @error('movieName')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm text-silver mb-1">Genre</label>
                <select name="genre_id" class="w-full px-3 py-2 rounded border border-gold/20 bg-onyx text-soft-white">
                    <option value="">Select genre</option>
                    @foreach ($genres ?? [] as $genre)
                        <option value="{{ $genre->genreId }}"
                            {{ old('genre_id') == $genre->genreId ? 'selected' : '' }}>
                            {{ $genre->genreName }}
                        </option>
                    @endforeach
                </select>
                @error('genre_id')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm text-silver mb-1">Duration (HH:MM)</label>
                <input type="text" name="duration" value="{{ old('duration') }}" placeholder="01:45"
                    class="w-full px-3 py-2 rounded border border-gold/20 bg-onyx text-soft-white">
                @error('duration')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm text-silver mb-1">Age Requirement</label>
                <select name="ageRequirement"
                    class="w-full px-3 py-2 rounded border border-gold/20 bg-onyx text-soft-white">
                    <option value="All" {{ old('ageRequirement') == 'All' ? 'selected' : '' }}>All ages</option>
                    <option value="6+" {{ old('ageRequirement') == '6+' ? 'selected' : '' }}>6+</option>
                    <option value="12+" {{ old('ageRequirement') == '12+' ? 'selected' : '' }}>12+</option>
                    <option value="16+" {{ old('ageRequirement') == '16+' ? 'selected' : '' }}>16+</option>
                    <option value="18+" {{ old('ageRequirement') == '18+' ? 'selected' : '' }}>18+</option>
                </select>
                @error('ageRequirement')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm text-silver mb-1">Description</label>
                <textarea name="description" rows="4"
                    class="w-full px-3 py-2 rounded border border-gold/20 bg-onyx text-soft-white" placeholder="Short synopsis">{{ old('description') }}</textarea>
                @error('description')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm text-silver mb-1">Poster Image (optional)</label>
                <input type="file" name="image" class="w-full text-sm text-soft-white">
                @error('image')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex gap-3 mt-4">
                <button type="submit" class="bg-gold text-onyx px-4 py-2 rounded hover:bg-cyan transition">Create
                    Movie</button>
                <a href="{{ route('movies.index') }}"
                    class="px-4 py-2 border border-gold rounded text-gold hover:bg-gold/10">Cancel</a>
            </div>
        </form>
    </section>

</x-layout>

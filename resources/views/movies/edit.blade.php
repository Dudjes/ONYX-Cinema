<x-layout title="Edit Movie - ONYX Cinema">

    <section class="py-12 px-6 lg:px-12">
        <div class="container mx-auto max-w-3xl">
            <div class="bg-charcoal rounded-2xl p-8 shadow-lg">
                <h2 class="text-2xl font-display text-gold mb-6">Edit Movie</h2>

                <form action="{{ route('movies.update', $movie) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div>
                        <label class="block text-sm text-silver mb-2">Movie Title</label>
                        <input type="text" name="movieName" value="{{ old('movieName', $movie->movieName) }}"
                            class="w-full px-4 py-3 rounded-lg bg-onyx text-soft-white border border-gold/20 focus:outline-none"
                            placeholder="Enter movie title">
                        @error('movieName')
                            <p class="text-sm text-red-400 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm text-silver mb-2">Genre</label>
                            <select name="genre_id"
                                class="w-full px-4 py-3 rounded-lg bg-onyx text-soft-white border border-gold/20">
                                <option value="">Select genre</option>
                                @foreach ($genres ?? [] as $genre)
                                    <option value="{{ $genre->genreId }}"
                                        {{ old('genre_id', $movie->genreId) == $genre->genreId ? 'selected' : '' }}>
                                        {{ $genre->genreName }}</option>
                                @endforeach
                            </select>
                            @error('genre_id')
                                <p class="text-sm text-red-400 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm text-silver mb-2">Duration (HH:MM)</label>
                            <input type="text" name="duration" value="{{ old('duration', $movie->duration) }}"
                                placeholder="e.g. 01:45"
                                class="w-full px-4 py-3 rounded-lg bg-onyx text-soft-white border border-gold/20">
                            @error('duration')
                                <p class="text-sm text-red-400 mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm text-silver mb-2">Age Requirement</label>
                            <select name="ageRequirement"
                                class="w-full px-4 py-3 rounded-lg bg-onyx text-soft-white border border-gold/20">
                                <option value="All"
                                    {{ old('ageRequirement', $movie->ageRequirement) == 'All' ? 'selected' : '' }}>All
                                    ages</option>
                                <option value="6+"
                                    {{ old('ageRequirement', $movie->ageRequirement) == '6+' ? 'selected' : '' }}>6+
                                </option>
                                <option value="12+"
                                    {{ old('ageRequirement', $movie->ageRequirement) == '12+' ? 'selected' : '' }}>
                                    12+</option>
                                <option value="16+"
                                    {{ old('ageRequirement', $movie->ageRequirement) == '16+' ? 'selected' : '' }}>
                                    16+</option>
                                <option value="18+"
                                    {{ old('ageRequirement', $movie->ageRequirement) == '18+' ? 'selected' : '' }}>
                                    18+</option>
                            </select>
                            @error('ageRequirement')
                                <p class="text-sm text-red-400 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm text-silver mb-2">Poster URL</label>
                            <input type="text" name="image" value="{{ old('image', $movie->image) }}"
                                placeholder="https://example.com/poster.jpg"
                                class="w-full px-4 py-3 rounded-lg bg-onyx text-soft-white border border-gold/20">
                            @if ($movie->image ?? false)
                                <div class="mt-2 flex items-center gap-3">
                                    @php
                                        $src = \Illuminate\Support\Str::startsWith($movie->image, [
                                            'http://',
                                            'https://',
                                            '//',
                                        ])
                                            ? $movie->image
                                            : asset('storage/' . $movie->image);
                                    @endphp
                                    <img src="{{ $src }}" alt="Current poster"
                                        class="w-24 h-36 object-cover rounded" />
                                    <label class="inline-flex items-center gap-2 text-sm text-silver">
                                        <input type="checkbox" name="remove_image" value="1" class="form-checkbox">
                                        Remove image
                                    </label>
                                </div>
                            @endif
                            @error('image')
                                <p class="text-sm text-red-400 mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm text-silver mb-2">Description</label>
                        <textarea name="description" rows="5"
                            class="w-full px-4 py-3 rounded-lg bg-onyx text-soft-white border border-gold/20" placeholder="Short synopsis">{{ old('description', $movie->description) }}</textarea>
                        @error('description')
                            <p class="text-sm text-red-400 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center gap-3">
                        <button type="submit"
                            class="bg-gold text-onyx px-6 py-3 rounded-lg font-semibold hover:bg-cyan transition-all">Save
                            Changes</button>
                        <a href="{{ route('movies.index') }}"
                            class="px-5 py-3 border border-gold text-gold rounded-lg hover:bg-gold/10">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </section>

</x-layout>

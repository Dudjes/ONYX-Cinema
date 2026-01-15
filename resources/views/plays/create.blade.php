<x-layout title="Create Play">

    <section class="max-w-3xl mx-auto p-8">

        <!-- Header -->
        <div class="mb-8">
            <h2 class="text-3xl font-display text-gold mb-2">
                Create Play
            </h2>
            <p class="text-silver">
                Schedule a movie showtime
            </p>
        </div>

        <!-- Form Card -->
        <div class="bg-charcoal rounded-2xl p-8 shadow-lg border border-white/5">
            <form action="{{ route('plays.store') }}" method="POST" class="space-y-6">
                @csrf

                {{-- Validation Errors --}}
                @if ($errors->any())
                    <div class="bg-red-600 text-white p-3 rounded-lg mb-4">
                        <ul class="list-disc list-inside text-sm">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Movie -->
                <div>
                    <label class="block text-sm font-semibold text-silver mb-2">
                        Movie
                    </label>
                    <select name="movieId" required
                            class="w-full bg-onyx border border-white/10 rounded-lg px-4 py-3
                                   text-soft-white focus:outline-none focus:ring-2 focus:ring-gold">
                        <option value="" disabled selected>Select a movie</option>
                        @foreach ($movies as $m)
                            <option value="{{ $m->movieId }}" {{ old('movieId') == $m->movieId ? 'selected' : '' }}>
                                {{ $m->movieName }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Hall -->
                <div>
                    <label class="block text-sm font-semibold text-silver mb-2">
                        Hall
                    </label>
                    <select name="hallId" required
                            class="w-full bg-onyx border border-white/10 rounded-lg px-4 py-3
                                   text-soft-white focus:outline-none focus:ring-2 focus:ring-gold">
                        <option value="" disabled selected>Select a hall</option>
                        @foreach ($halls as $h)
                            <option value="{{ $h->hallId }}" {{ old('hallId') == $h->hallId ? 'selected' : '' }}>
                                Hall {{ $h->hallNumber }}
                                {{ $h->cinema ? '– ' . $h->cinema->cinemaName : '' }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Cinema -->
                <div>
                    <label class="block text-sm font-semibold text-silver mb-2">
                        Cinema
                    </label>
                    <select name="cinemaId" required
                            class="w-full bg-onyx border border-white/10 rounded-lg px-4 py-3
                                   text-soft-white focus:outline-none focus:ring-2 focus:ring-gold">
                        <option value="" disabled selected>Select a cinema</option>
                        @foreach ($cinemas as $c)
                            <option value="{{ $c->cinemaId }}" {{ old('cinemaId') == $c->cinemaId ? 'selected' : '' }}>
                                {{ $c->cinemaName }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Date & Time -->
                <div>
                    <label class="block text-sm font-semibold text-silver mb-2">
                        Showtime
                    </label>
                    <input type="datetime-local" name="when" value="{{ old('when') }}" required
                           class="w-full bg-onyx border border-white/10 rounded-lg px-4 py-3
                                  text-soft-white focus:outline-none focus:ring-2 focus:ring-gold">
                </div>

                <!-- Actions -->
                <div class="flex justify-end gap-4 pt-6">
                    <a href="{{ route('plays.index') }}"
                       class="px-6 py-3 rounded-lg border border-white/20 text-silver hover:border-gold hover:text-gold transition">
                        Cancel
                    </a>

                    <button type="submit"
                            class="px-8 py-3 rounded-lg bg-gold text-onyx font-semibold
                                   hover:bg-cyan hover:-translate-y-0.5 transition">
                        Create Play
                    </button>
                </div>
            </form>
        </div>

    </section>

</x-layout>

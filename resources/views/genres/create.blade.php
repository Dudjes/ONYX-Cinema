<x-layout title="Create Genre">

    <section class="max-w-2xl mx-auto p-8">

        <!-- Header -->
        <div class="mb-8">
            <h2 class="text-3xl font-display text-gold mb-2">
                Create Genre
            </h2>
            <p class="text-silver">
                Add a new movie genre
            </p>
        </div>

        <!-- Form Card -->
        <div class="bg-charcoal rounded-2xl p-8 shadow-lg border border-white/5">
            <form action="{{ route('genres.store') }}" method="POST" class="space-y-6">
                @csrf

                <!-- Genre Name -->
                <div>
                    <label class="block text-sm font-semibold text-silver mb-2">
                        Genre name
                    </label>
                    <input name="genreName" type="text"
                           class="w-full bg-onyx border border-white/10 rounded-lg px-4 py-3
                                  text-soft-white focus:outline-none focus:ring-2 focus:ring-gold"
                           placeholder="e.g. Action">
                </div>

                <!-- Actions -->
                <div class="flex justify-end gap-4 pt-6">
                    <a href="{{ route('genres.index') }}"
                       class="px-6 py-3 rounded-lg border border-white/20 text-silver
                              hover:border-gold hover:text-gold transition">
                        Cancel
                    </a>

                    <button type="submit"
                            class="px-8 py-3 rounded-lg bg-gold text-onyx font-semibold
                                   hover:bg-cyan hover:-translate-y-0.5 transition">
                        Create Genre
                    </button>
                </div>

            </form>
        </div>

    </section>

</x-layout>

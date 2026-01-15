<x-layout title="Create Cinema">

    <section class="max-w-3xl mx-auto p-8">

        <!-- Header -->
        <div class="mb-8">
            <h2 class="text-3xl font-display text-gold mb-2">
                Create Cinema
            </h2>
            <p class="text-silver">
                Add a new cinema location
            </p>
        </div>

        <!-- Form Card -->
        <div class="bg-charcoal rounded-2xl p-8 shadow-lg border border-white/5">
            <form action="{{ route('cinemas.store') }}" method="POST" class="space-y-6">
                @csrf

                <!-- Name -->
                <div>
                    <label class="block text-sm font-semibold text-silver mb-2">
                        Cinema Name
                    </label>
                    <input name="cinemaName" type="text"
                           class="w-full bg-onyx border border-white/10 rounded-lg px-4 py-3
                                  text-soft-white focus:outline-none focus:ring-2 focus:ring-gold"
                           placeholder="e.g. ONYX Haarlem">
                </div>

                <!-- Address -->
                <div>
                    <label class="block text-sm font-semibold text-silver mb-2">
                        Address
                    </label>
                    <input name="address" type="text"
                           class="w-full bg-onyx border border-white/10 rounded-lg px-4 py-3
                                  text-soft-white focus:outline-none focus:ring-2 focus:ring-gold"
                           placeholder="e.g. Kerkstraat 12, Haarlem">
                </div>

                <!-- Screen Size -->
                <div>
                    <label class="block text-sm font-semibold text-silver mb-2">
                        Screen Size (m)
                    </label>
                    <input name="screenSize" type="number" step="0.1"
                           class="w-full bg-onyx border border-white/10 rounded-lg px-4 py-3
                                  text-soft-white focus:outline-none focus:ring-2 focus:ring-gold"
                           placeholder="e.g. 12.5">
                </div>

                <!-- Actions -->
                <div class="flex justify-end gap-4 pt-6">
                    <a href="{{ route('cinemas.index') }}"
                       class="px-6 py-3 rounded-lg border border-white/20 text-silver
                              hover:border-gold hover:text-gold transition">
                        Cancel
                    </a>

                    <button type="submit"
                            class="px-8 py-3 rounded-lg bg-gold text-onyx font-semibold
                                   hover:bg-cyan hover:-translate-y-0.5 transition">
                        Create Cinema
                    </button>
                </div>

            </form>
        </div>

    </section>

</x-layout>

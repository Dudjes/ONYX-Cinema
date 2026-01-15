<x-layout title="Create Hall">

    <section class="max-w-3xl mx-auto p-8">

        <!-- Header -->
        <div class="mb-8">
            <h2 class="text-3xl font-display text-gold mb-2">
                Create Hall
            </h2>
            <p class="text-silver">
                Add a new cinema hall
            </p>
        </div>

        <!-- Form Card -->
        <div class="bg-charcoal rounded-2xl p-8 shadow-lg border border-white/5">
            <form action="{{ route('halls.store') }}" method="POST" class="space-y-6">
                @csrf

                <!-- Hall Number -->
                <div>
                    <label class="block text-sm font-semibold text-silver mb-2">
                        Hall Number
                    </label>
                    <input name="hallNumber" type="number"
                           class="w-full bg-onyx border border-white/10 rounded-lg px-4 py-3
                                  text-soft-white focus:outline-none focus:ring-2 focus:ring-gold"
                           placeholder="e.g. 1">
                </div>

                <!-- Capacity -->
                <div>
                    <label class="block text-sm font-semibold text-silver mb-2">
                        Capacity
                    </label>
                    <input name="capacity" type="number"
                           class="w-full bg-onyx border border-white/10 rounded-lg px-4 py-3
                                  text-soft-white focus:outline-none focus:ring-2 focus:ring-gold"
                           placeholder="e.g. 120">
                </div>

                <!-- Cinema -->
                <div>
                    <label class="block text-sm font-semibold text-silver mb-2">
                        Cinema
                    </label>
                    <select name="cinemaId"
                            class="w-full bg-onyx border border-white/10 rounded-lg px-4 py-3
                                   text-soft-white focus:outline-none focus:ring-2 focus:ring-gold">
                        @foreach ($cinemas as $c)
                            <option value="{{ $c->cinemaId }}">
                                {{ $c->cinemaName }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Actions -->
                <div class="flex justify-end gap-4 pt-6">
                    <a href="{{ route('halls.index') }}"
                       class="px-6 py-3 rounded-lg border border-white/20 text-silver
                              hover:border-gold hover:text-gold transition">
                        Cancel
                    </a>

                    <button type="submit"
                            class="px-8 py-3 rounded-lg bg-gold text-onyx font-semibold
                                   hover:bg-cyan hover:-translate-y-0.5 transition">
                        Create Hall
                    </button>
                </div>

            </form>
        </div>

    </section>

</x-layout>

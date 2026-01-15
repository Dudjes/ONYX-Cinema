<x-layout title="Plays">

    <section class="py-12 px-6 lg:px-12">
        <div class="container mx-auto max-w-6xl">

            {{-- Header --}}
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-8">
                <h2 class="text-3xl font-display text-gold">Plays</h2>

                <a href="{{ route('plays.create') }}"
                    class="mt-4 sm:mt-0 inline-flex items-center gap-2 bg-gold text-onyx px-5 py-3 rounded-xl font-semibold hover:bg-cyan transition shadow">
                    ➕ Create Play
                </a>
            </div>

            {{-- Plays list --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @forelse ($plays as $play)
                    @php
                        $capacity = $play->hall->capacity ?? 0;
                        $sold = $play->tickets->count();
                        $ticketsLeft = max($capacity - $sold, 0);
                        $progress = $capacity ? (($sold / $capacity) * 100) : 0;
                    @endphp

                    <div class="bg-charcoal rounded-2xl shadow-lg overflow-hidden border border-white/5 hover:shadow-xl transition">
                        <div class="p-6">
                            <h3 class="text-xl font-semibold text-gold mb-2">
                                {{ $play->movie->movieName ?? '—' }}
                            </h3>
                            <p class="text-silver mb-1">
                                {{ $play->cinema->cinemaName ?? '—' }} • Hall {{ $play->hall->hallNumber ?? '—' }}
                            </p>
                            <p class="text-silver mb-3">
                                {{ \Carbon\Carbon::parse($play->when)->format('D d M Y · H:i') }}
                            </p>

                            {{-- Tickets left progress --}}
                            <div class="mb-2">
                                <div class="w-full bg-white/10 rounded-full h-3 overflow-hidden">
                                    <div class="bg-gold h-3" style="width: {{ 100 - $progress }}%"></div>
                                </div>
                                <p class="text-sm text-silver mt-1">{{ $ticketsLeft }} tickets left</p>
                            </div>

                            {{-- Actions --}}
                            <div class="flex gap-3 mt-4 flex-wrap">
                                <a href="{{ route('plays.show', $play) }}"
                                    class="px-3 py-2 text-sm rounded-lg border border-gold text-gold hover:bg-gold/10 transition">
                                    View
                                </a>

                                <a href="{{ route('plays.edit', $play) }}"
                                    class="px-3 py-2 text-sm rounded-lg bg-green-600 text-white hover:bg-green-500 transition">
                                    Edit
                                </a>

                                <form action="{{ route('plays.destroy', $play) }}" method="POST"
                                      onsubmit="return confirm('Delete this play?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="px-3 py-2 text-sm rounded-lg bg-red-600 text-white hover:bg-red-500 transition">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-1 md:col-span-2 text-center text-silver py-10">
                        No plays scheduled yet 🎬
                    </div>
                @endforelse
            </div>

        </div>
    </section>

</x-layout>

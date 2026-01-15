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
            <div class="bg-charcoal rounded-2xl shadow-xl overflow-hidden">
                <table class="w-full text-left">
                    <thead class="bg-onyx text-silver text-sm uppercase">
                        <tr>
                            <th class="px-6 py-4">Movie</th>
                            <th class="px-6 py-4">Cinema</th>
                            <th class="px-6 py-4">Date & Time</th>
                            <th class="px-6 py-4 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($plays as $p)
                            <tr class="border-b border-gold/10 hover:bg-onyx/60 transition">
                                <td class="px-6 py-4 font-semibold text-soft-white">
                                    {{ $p->movie->movieName ?? '—' }}
                                </td>

                                <td class="px-6 py-4 text-silver">
                                    {{ $p->cinema->cinemaName ?? '—' }}
                                </td>

                                <td class="px-6 py-4 text-silver">
                                    {{ \Carbon\Carbon::parse($p->when)->format('D d M Y · H:i') }}
                                </td>

                                <td class="px-6 py-4">
                                    <div class="flex justify-end gap-3">
                                        <a href="{{ route('plays.show', $p) }}"
                                            class="px-3 py-2 text-sm rounded-lg border border-gold text-gold hover:bg-gold/10 transition">
                                            View
                                        </a>

                                        <a href="{{ route('plays.edit', $p) }}"
                                            class="px-3 py-2 text-sm rounded-lg bg-green-600 text-white hover:bg-green-500 transition">
                                            Edit
                                        </a>

                                        <form action="{{ route('plays.destroy', $p) }}" method="POST"
                                            onsubmit="return confirm('Delete this play?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="px-3 py-2 text-sm rounded-lg bg-red-600 text-white hover:bg-red-500 transition">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-6 py-10 text-center text-silver">
                                    No plays scheduled yet 🎬
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </section>

</x-layout>

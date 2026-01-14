<x-layout title="Dashboard - ONYX Cinema">

    <section class="py-12 px-6 lg:px-12">
        <div class="container mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
                <aside class="lg:col-span-1 bg-charcoal rounded-2xl p-6">
                    <h3 class="text-lg font-semibold text-gold mb-2">Welcome, {{ Auth::user()->name }}</h3>
                    <p class="text-sm text-silver">Overview & quick actions</p>

                    <div class="mt-6 space-y-3">
                        <a href="{{ route('movies.create') }}"
                            class="block bg-gold text-onyx px-4 py-2 rounded-lg font-semibold hover:bg-cyan transition">Add
                            Movie</a>
                        <a href="{{ route('movies.index') }}"
                            class="block px-4 py-2 border border-gold text-gold rounded-lg hover:bg-gold/10">View
                            Movies</a>
                    </div>
                </aside>

                <main class="lg:col-span-3 bg-charcoal rounded-2xl p-6">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-2xl font-display text-gold">Dashboard</h2>
                        <p class="text-sm text-silver">Quick stats</p>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                        <div class="p-4 bg-onyx/30 rounded-lg">
                            <p class="text-sm text-silver">Movies</p>
                            <p class="text-2xl text-gold font-bold">{{ \App\Models\Movie::count() }}</p>
                        </div>

                        <div class="p-4 bg-onyx/30 rounded-lg">
                            <p class="text-sm text-silver">Cinemas</p>
                            <p class="text-2xl text-gold font-bold">{{ \App\Models\Cinema::count() }}</p>
                        </div>

                        <div class="p-4 bg-onyx/30 rounded-lg">
                            <p class="text-sm text-silver">Tickets</p>
                            <p class="text-2xl text-gold font-bold">{{ \App\Models\Ticket::count() }}</p>
                        </div>
                    </div>

                    <div class="mt-8">
                        <h3 class="text-lg font-semibold text-gold mb-3">Recent Movies</h3>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            @foreach (\App\Models\Movie::latest()->take(4)->get() as $movie)
                                <div class="p-4 bg-onyx/20 rounded-lg">
                                    <div class="flex items-center justify-between">
                                        <div>
                                            <p class="text-sm text-silver">{{ $movie->movieName }}</p>
                                            <p class="text-xs text-soft-white mt-1">
                                                {{ $movie->genre->genreName ?? '—' }}</p>
                                        </div>
                                        <span
                                            class="text-gold font-bold">{{ \Carbon\Carbon::parse($movie->duration)->format('H\h i\m') }}</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </section>

</x-layout>


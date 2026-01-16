<x-layout title="Dashboard - Users">

    <section class="py-12 px-6 lg:px-12 bg-charcoal/5">
        <div class="container mx-auto">

            {{-- Header --}}
            <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between mb-8 gap-4">
                <h2 class="text-3xl font-display text-gold">Users Dashboard</h2>
                <p class="text-sm text-silver">Overview & quick stats</p>
            </div>

            {{-- Stats Cards --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
                <div class="p-6 bg-onyx/10 rounded-2xl shadow hover:shadow-lg transition duration-300 text-center">
                    <div class="flex justify-center mb-2 text-4xl">👥</div>
                    <p class="text-sm text-silver uppercase tracking-wider">Total Users</p>
                    <p class="text-3xl text-gold font-bold">{{ $totalUsers }}</p>
                </div>

                <div class="p-6 bg-onyx/10 rounded-2xl shadow hover:shadow-lg transition duration-300 text-center">
                    <div class="flex justify-center mb-2 text-4xl">✅</div>
                    <p class="text-sm text-silver uppercase tracking-wider">Verified Users</p>
                    <p class="text-3xl text-cyan font-bold">{{ $verifiedUsers }}</p>
                </div>

                <div class="p-6 bg-onyx/10 rounded-2xl shadow hover:shadow-lg transition duration-300 text-center">
                    <div class="flex justify-center mb-2 text-4xl">❌</div>
                    <p class="text-sm text-silver uppercase tracking-wider">Unverified Users</p>
                    <p class="text-3xl text-red-500 font-bold">{{ $unverifiedUsers }}</p>
                </div>
            </div>

            {{-- Users Table --}}
            <div class="overflow-x-auto bg-onyx/5 rounded-2xl shadow">
                <table class="min-w-full divide-y divide-onyx">
                    <thead class="bg-onyx/10 text-soft-white text-xs uppercase tracking-wider">
                        <tr>
                            <th class="px-6 py-3 text-left">ID</th>
                            <th class="px-6 py-3 text-left">Name</th>
                            <th class="px-6 py-3 text-left">Email</th>
                            <th class="px-6 py-3 text-left">Verified</th>
                            <th class="px-6 py-3 text-left">Joined</th>
                        </tr>
                    </thead>
                    <tbody class="bg-onyx/0 divide-y divide-onyx/20 text-sm text-soft-white">
                        @forelse($users as $user)
                            <tr class="hover:bg-onyx/10 transition-colors rounded-lg">
                                <td class="px-6 py-4">{{ $user->id }}</td>
                                <td class="px-6 py-4 font-medium">{{ $user->name }}</td>
                                <td class="px-6 py-4">{{ $user->email }}</td>
                                <td class="px-6 py-4">
                                    @if($user->email_verified_at)
                                        <span class="bg-emerald-500/20 text-emerald-400 px-2 py-1 rounded-full text-xs font-semibold">Verified</span>
                                    @else
                                        <span class="bg-red-500/20 text-red-500 px-2 py-1 rounded-full text-xs font-semibold">Unverified</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4">{{ $user->created_at->format('d M Y') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-6 text-center text-silver">
                                    No users found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </section>

</x-layout>

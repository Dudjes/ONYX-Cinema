<x-layout :title="'Edit Account'">

    <section class="py-16 px-6 lg:px-12">
        <div class="container mx-auto max-w-3xl">

            <h1 class="text-5xl font-bold text-gold mb-6">Edit Account</h1>

            <form action="{{ route('user.update', $user) }}" method="POST" class="bg-charcoal rounded-2xl p-8 shadow-xl border border-gold/20 space-y-6">
                @csrf
                @method('PUT')

                <div>
                    <label for="name" class="block text-gold font-semibold mb-2">Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}"
                           class="w-full px-4 py-2 rounded-lg bg-charcoal border border-gold/30 text-silver focus:outline-none focus:border-gold">
                    @error('name')
                        <p class="text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="email" class="block text-gold font-semibold mb-2">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}"
                           class="w-full px-4 py-2 rounded-lg bg-charcoal border border-gold/30 text-silver focus:outline-none focus:border-gold">
                    @error('email')
                        <p class="text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Add other fields if needed --}}

                <div class="flex gap-4">
                    <button type="submit" class="bg-gold text-onyx px-6 py-3 rounded-xl font-semibold hover:bg-cyan transition">
                        Save Changes
                    </button>
                    <a href="{{ route('user.info', $user) }}" class="border border-gold text-gold px-6 py-3 rounded-xl hover:bg-gold/10 transition">
                        Cancel
                    </a>
                </div>
            </form>

        </div>
    </section>

</x-layout>

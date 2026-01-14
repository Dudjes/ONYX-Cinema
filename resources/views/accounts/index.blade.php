<x-layout title="Accounts">
    <section class="p-8">
        <h2 class="text-2xl text-gold mb-4">Accounts</h2>
        <a href="{{ route('accounts.create') }}" class="bg-gold px-3 py-2 rounded">Create Account</a>
        <div class="mt-4">
            <ul>
                @foreach ($accounts as $acc)
                    <li class="py-2 border-b">{{ $acc->firstname }} {{ $acc->lastname }} — {{ $acc->email }}
                        <a href="{{ route('accounts.show', $acc) }}" class="ml-2 text-gold">View</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </section>
</x-layout>

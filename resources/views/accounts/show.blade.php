<x-layout :title="$account->firstname">
    <section class="p-8">
        <h2 class="text-2xl text-gold">{{ $account->firstname }} {{ $account->lastname }}</h2>
        <p class="text-silver">{{ $account->email }}</p>
        <a href="{{ route('accounts.edit', $account) }}" class="text-gold">Edit</a>
    </section>
</x-layout>

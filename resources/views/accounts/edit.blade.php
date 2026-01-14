<x-layout title="Edit Account">
    <section class="p-8">
        <h2 class="text-2xl text-gold mb-4">Edit Account</h2>
        <form action="{{ route('accounts.update', $account) }}" method="POST">
            @csrf
            @method('PUT')
            <div>
                <label>First name</label>
                <input name="firstname" value="{{ old('firstname', $account->firstname) }}" />
            </div>
            <div>
                <label>Last name</label>
                <input name="lastname" value="{{ old('lastname', $account->lastname) }}" />
            </div>
            <div>
                <label>Email</label>
                <input name="email" value="{{ old('email', $account->email) }}" />
            </div>
            <div>
                <label>Password (leave blank to keep)</label>
                <input name="password" type="password" />
            </div>
            <button class="bg-gold px-3 py-2 mt-3">Save</button>
        </form>
    </section>
</x-layout>

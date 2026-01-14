<x-layout title="Create Account">
    <section class="p-8">
        <h2 class="text-2xl text-gold mb-4">Create Account</h2>
        <form action="{{ route('accounts.store') }}" method="POST">
            @csrf
            <div>
                <label>First name</label>
                <input name="firstname" />
            </div>
            <div>
                <label>Last name</label>
                <input name="lastname" />
            </div>
            <div>
                <label>Email</label>
                <input name="email" />
            </div>
            <div>
                <label>Password</label>
                <input name="password" type="password" />
            </div>
            <button class="bg-gold px-3 py-2 mt-3">Create</button>
        </form>
    </section>
</x-layout>

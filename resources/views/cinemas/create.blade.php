<x-layout title="Create Cinema">
    <section class="p-8">
        <h2 class="text-2xl text-gold mb-4">Create Cinema</h2>
        <form action="{{ route('cinemas.store') }}" method="POST">
            @csrf
            <div>
                <label>Name</label>
                <input name="cinemaName" />
            </div>
            <div>
                <label>Address</label>
                <input name="adress" />
            </div>
            <div>
                <label>Screen Size (m)</label>
                <input name="screenSize" />
            </div>
            <button class="bg-gold px-3 py-2 mt-3">Create</button>
        </form>
    </section>
</x-layout>

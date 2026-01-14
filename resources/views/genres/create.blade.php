<x-layout title="Create Genre">
    <section class="p-8">
        <h2 class="text-2xl text-gold mb-4">Create Genre</h2>
        <form action="{{ route('genres.store') }}" method="POST">
            @csrf
            <div>
                <label>Name</label>
                <input name="genreName" />
            </div>
            <button class="bg-gold px-3 py-2 mt-3">Create</button>
        </form>
    </section>
</x-layout>

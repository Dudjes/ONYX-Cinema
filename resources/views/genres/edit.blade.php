<x-layout title="Edit Genre">
    <section class="p-8">
        <h2 class="text-2xl text-gold mb-4">Edit Genre</h2>
        <form action="{{ route('genres.update', $genre) }}" method="POST">
            @csrf
            @method('PUT')
            <div>
                <label>Name</label>
                <input name="genreName" value="{{ old('genreName', $genre->genreName) }}" />
            </div>
            <button class="bg-gold px-3 py-2 mt-3">Save</button>
        </form>
    </section>
</x-layout>

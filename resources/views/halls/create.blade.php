<x-layout title="Create Hall">
    <section class="p-8">
        <h2 class="text-2xl text-gold mb-4">Create Hall</h2>
        <form action="{{ route('halls.store') }}" method="POST">
            @csrf
            <div>
                <label>Hall Number</label>
                <input name="hallNumber" />
            </div>
            <div>
                <label>Capacity</label>
                <input name="capacity" />
            </div>
            <div>
                <label>Cinema</label>
                <select name="cinemaId">
                    @foreach ($cinemas as $c)
                        <option value="{{ $c->cinemaId }}">{{ $c->cinemaName }}</option>
                    @endforeach
                </select>
            </div>
            <button class="bg-gold px-3 py-2 mt-3">Create</button>
        </form>
    </section>
</x-layout>

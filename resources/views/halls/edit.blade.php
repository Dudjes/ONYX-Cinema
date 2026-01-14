<x-layout title="Edit Hall">
    <section class="p-8">
        <h2 class="text-2xl text-gold mb-4">Edit Hall</h2>
        <form action="{{ route('halls.update', $hall) }}" method="POST">
            @csrf
            @method('PUT')
            <div>
                <label>Hall Number</label>
                <input name="hallNumber" value="{{ old('hallNumber', $hall->hallNumber) }}" />
            </div>
            <div>
                <label>Capacity</label>
                <input name="capacity" value="{{ old('capacity', $hall->capacity) }}" />
            </div>
            <div>
                <label>Cinema</label>
                <select name="cinemaId">
                    @foreach ($cinemas as $c)
                        <option value="{{ $c->cinemaId }}"
                            {{ $c->cinemaId == old('cinemaId', $hall->cinemaId) ? 'selected' : '' }}>
                            {{ $c->cinemaName }}</option>
                    @endforeach
                </select>
            </div>
            <button class="bg-gold px-3 py-2 mt-3">Save</button>
        </form>
    </section>
</x-layout>

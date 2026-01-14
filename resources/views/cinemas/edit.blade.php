<x-layout title="Edit Cinema">
    <section class="p-8">
        <h2 class="text-2xl text-gold mb-4">Edit Cinema</h2>
        <form action="{{ route('cinemas.update', $cinema) }}" method="POST">
            @csrf
            @method('PUT')
            <div>
                <label>Name</label>
                <input name="cinemaName" value="{{ old('cinemaName', $cinema->cinemaName) }}" />
            </div>
            <div>
                <label>Address</label>
                <input name="adress" value="{{ old('adress', $cinema->adress) }}" />
            </div>
            <div>
                <label>Screen Size (m)</label>
                <input name="screenSize" value="{{ old('screenSize', $cinema->screenSize) }}" />
            </div>
            <button class="bg-gold px-3 py-2 mt-3">Save</button>
        </form>
    </section>
</x-layout>

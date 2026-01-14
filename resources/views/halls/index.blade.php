<x-layout title="Halls">
    <section class="p-8">
        <h2 class="text-2xl text-gold mb-4">Halls</h2>
        <a href="{{ route('halls.create') }}" class="bg-gold px-3 py-2 rounded">Create Hall</a>
        <div class="mt-4">
            <ul>
                @foreach ($halls as $h)
                    <li class="py-2 border-b">Hall {{ $h->hallNumber }} — {{ $h->capacity }} seats —
                        {{ $h->cinema->cinemaName ?? '—' }}
                        <a href="{{ route('halls.show', $h) }}" class="ml-2 text-gold">Detail</a>
                        <a href="{{ route('halls.edit', $h) }}" class="ml-2 text-green-500">Edit</a>
                        <form action="{{ route('halls.destroy', $h) }}" method="POST" class="inline-block ml-2">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500"
                                onclick="return confirm('Delete this hall?')">Delete</button>
                        </form>
                    </li>
                @endforeach
            </ul>
        </div>
    </section>
</x-layout>

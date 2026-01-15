<x-layout title="Choose Seat">
    <section class="p-8 max-w-3xl mx-auto">
        <h2 class="text-2xl text-gold mb-2">{{ $movie->movieName }}</h2>
        <p class="text-silver mb-6">{{ \Carbon\Carbon::parse($play->when)->format('D d M – H:i') }}</p>

        <form action="{{ route('tickets.store') }}" method="POST" id="seatForm">
            @csrf
            <input type="hidden" name="playId" value="{{ $play->playId }}">

            <!-- Screen -->
            <div class="mb-4 text-center text-white font-semibold">🎬 SCREEN</div>

            <div class="grid gap-2 mb-8">
                @php
                    $cols = 8; // seats per row
                    $rows = ceil($totalSeats / $cols);
                    $seatNumber = 1;
                @endphp

                @for ($r = 0; $r < $rows; $r++)
                    <div class="grid gap-2 justify-center" style="grid-template-columns: repeat({{ $cols }}, minmax(0, 1fr));">
                        @for ($c = 1; $c <= $cols; $c++)
                            @if ($seatNumber <= $totalSeats)
                                @php
                                    $sold = in_array($seatNumber, $soldSeats);
                                    $rowLetter = chr(65 + $r);
                                @endphp

                                <label class="flex justify-center {{ $sold ? 'cursor-not-allowed' : 'cursor-pointer' }} relative">
                                    <input 
                                        type="radio" 
                                        name="seat" 
                                        value="{{ $seatNumber }}"
                                        class="hidden seat-radio"
                                        {{ $sold ? 'disabled' : '' }}
                                        required>

                                    <div class="seat-box w-12 h-12 rounded-md flex items-center justify-center text-sm font-semibold transition-colors duration-200
                                        @if($sold)
                                            bg-red-600 text-white cursor-not-allowed
                                        @else
                                            bg-emerald-600 text-black hover:bg-emerald-500
                                        @endif
                                    ">
                                        {{ $rowLetter }}{{ $c }}
                                    </div>
                                </label>

                                @php $seatNumber++; @endphp
                            @endif
                        @endfor
                    </div>
                @endfor
            </div>

            <button type="submit" class="bg-gold text-onyx px-6 py-3 rounded-lg font-semibold hover:bg-yellow-500 transition-colors">
                Confirm Ticket
            </button>
        </form>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const radios = document.querySelectorAll('.seat-radio:not([disabled])');
            
            radios.forEach(radio => {
                radio.addEventListener('change', function() {
                    // Remove selected state from all seats
                    document.querySelectorAll('.seat-box').forEach(box => {
                        if (!box.closest('label').querySelector('input').disabled) {
                            box.classList.remove('bg-gold', 'text-onyx', 'ring-2', 'ring-gold');
                            box.classList.add('bg-emerald-600', 'text-black');
                        }
                    });
                    
                    // Add selected state to clicked seat
                    if (this.checked) {
                        const seatBox = this.closest('label').querySelector('.seat-box');
                        seatBox.classList.remove('bg-emerald-600', 'text-black');
                        seatBox.classList.add('bg-gold', 'text-onyx', 'ring-2', 'ring-gold');
                    }
                });
            });
        });
    </script>
</x-layout>
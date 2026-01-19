<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>My Ticket Report</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; color: #333; }
        h1 { color: #bfa02f; font-size: 24px; }
        h2 { color: #bfa02f; font-size: 20px; margin-top: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        th { background-color: #f5f5dc; }
        ul { list-style: none; padding-left: 0; }
        li { margin-bottom: 4px; }
        .section { margin-bottom: 20px; }
    </style>
</head>
<body>

    <h1>My Report</h1>

    <div class="section">
        <h2>User Info</h2>
        <ul>
            <li><strong>Name:</strong> {{ $user->name }}</li>
            <li><strong>Email:</strong> {{ $user->email }}</li>
            <li><strong>Total Tickets Bought:</strong> {{ $totalTickets }}</li>
        </ul>
    </div>

    <div class="section">
        <h2>Tickets per Movie</h2>
        <ul>
            @foreach($ticketsPerMovie as $movieName => $count)
                <li>{{ $movieName }}: {{ $count }}</li>
            @endforeach
        </ul>
    </div>

    <div class="section">
        <h2>My Tickets</h2>
        @if ($tickets->isEmpty())
            <p>You haven’t bought any tickets yet.</p>
        @else
            <table>
                <thead>
                    <tr>
                        <th>Movie</th>
                        <th>Play Date</th>
                        <th>Time</th>
                        <th>Seat</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tickets as $ticket)
                        <tr>
                            <td>{{ $ticket->play->movie->movieName ?? '—' }}</td>
                            <td>{{ \Carbon\Carbon::parse($ticket->play->date)->format('d M Y') }}</td>
                            <td>{{ \Carbon\Carbon::parse($ticket->play->time)->format('H:i') }}</td>
                            <td>{{ $ticket->seat ?? '—' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

</body>
</html>

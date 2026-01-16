<h1>Hello {{ $ticket->user->name }},</h1>
<p>Thank you for purchasing a ticket at <strong>Onyx Cinema</strong>! 🎬</p>

<h2>Ticket Details</h2>
<ul>
    <li><strong>Movie:</strong> {{ $ticket->play->movie->movieName }}</li>
    <li><strong>Date:</strong> {{ \Carbon\Carbon::parse($ticket->play->date)->format('d M Y') }}</li>
    <li><strong>Time:</strong> {{ \Carbon\Carbon::parse($ticket->play->time)->format('H:i') }}</li>
    <li><strong>Cinema:</strong> {{ $ticket->play->hall->cinema->cinemaName ?? '—' }}</li>
    <li><strong>Hall:</strong> {{ $ticket->play->hall->hallNumber ?? '—' }}</li>
    <li><strong>Seat:</strong> {{ $ticket->seat ?? '—' }}</li>
</ul>

<p>Enjoy your movie!</p>
<p>— Onyx Cinema</p>

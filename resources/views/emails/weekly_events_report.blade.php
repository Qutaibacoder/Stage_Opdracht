<!DOCTYPE html>
<html>
<head>
    <title>Wekelijks Event Overzicht</title>
</head>
<body>
<h1>Event Overzicht voor de Komende Week</h1>

@if($events->isEmpty())
    <p>Er zijn geen geplande events voor de komende week.</p>
@else
    <ul>
        @foreach($events as $event)
            <li>{{ $event->name }} - {{ $event->date}}</li>
        @endforeach
    </ul>
@endif
</body>
</html>

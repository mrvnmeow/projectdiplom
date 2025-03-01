<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Календарь</title>
    <link rel="stylesheet" href="{{ asset('css/calendar.css') }}">
</head>
<body>
    <h1>Календарь для {{ $currentDate->format('F Y') }}</h1>
    <table>
        <tr>
            @for ($i = 0; $i < 7; $i++)
                <th>{{ \Carbon\Carbon::now()->startOfWeek()->addDays($i)->format('l') }}</th>
            @endfor
        </tr>
        <tr>
            @for ($i = 0; $i < $firstDayOfMonth; $i++)
                <td></td>
            @endfor
            @for ($day = 1; $day <= $daysInMonth; $day++)
                <td>{{ $day }}</td>
                @if (($day + $firstDayOfMonth) % 7 == 0)
                    </tr><tr>
                @endif
            @endfor
        </tr>
    </table>
</body>
</html>

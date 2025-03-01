@extends('layouts.calendar')
@section('title', 'Календарь')

@section('content')
<div class="calendar-container">
    <div class="calendar-header">
        <h1>{{ $currentDate->format('F Y') }}</h1>
        <div>
            <a href="{{ route('calendar.index', ['month' => $currentDate->subMonth()->format('m'), 'year' => $currentDate->format('Y')]) }}" class="btn btn-secondary">Предыдущий месяц</a>
            <a href="{{ route('calendar.index', ['month' => $currentDate->addMonth()->format('m'), 'year' => $currentDate->format('Y')]) }}" class="btn btn-secondary">Следующий месяц</a>
        </div>
    </div>

    <div class="calendar-grid">
        <div class="calendar-day"><strong>Пн</strong></div>
        <div class="calendar-day"><strong>Вт</strong></div>
        <div class="calendar-day"><strong>Ср</strong></div>
        <div class="calendar-day"><strong>Чт</strong></div>
        <div class="calendar-day"><strong>Пт</strong></div>
        <div class="calendar-day"><strong>Сб</strong></div>
        <div class="calendar-day"><strong>Вс</strong></div>

        @for ($i = 0; $i < $firstDayOfMonth; $i++)
            <div class="calendar-day"></div>
        @endfor

        @for ($day = 1; $day <= $daysInMonth; $day++)
            <div class="calendar-day">
                {{ $day }}
                @if (array_key_exists($day, $events))
                    @foreach ($events[$day] as $event)
                        <div class="event">{{ $event }}</div>
                    @endforeach
                @endif
            </div>
        @endfor
    </div>
</div>
@endsection

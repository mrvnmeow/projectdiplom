<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CalendarController extends Controller
{
    public function index(Request $request)
    {
        // Получаем текущую дату или дату из запроса
        $currentDate = Carbon::now();

        if ($request->has('month') && $request->has('year')) {
            $currentDate = Carbon::createFromDate($request->year, $request->month, 1);
        }

        // Получаем количество дней в месяце и первый день месяца
        $daysInMonth = $currentDate->daysInMonth;
        $firstDayOfMonth = $currentDate->startOfMonth()->dayOfWeek;

        // Пример событий (в реальном приложении вы бы получали их из базы данных)
        $events = [
            1 => ['Событие 1', 'Событие 2'],
            5 => ['Событие 3'],
            10 => ['Событие 4', 'Событие 5'],
            15 => ['Событие 6'],
            20 => ['Событие 7', 'Событие 8'],
            25 => ['Событие 9'],
            30 => ['Событие 10'],
        ];

        return view('calendar.index', [
            'currentDate' => $currentDate,
            'daysInMonth' => $daysInMonth,
            'firstDayOfMonth' => $firstDayOfMonth,
            'events' => $events,
        ]);
    }
}

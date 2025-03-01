@extends('layouts.app')

@section('title', 'Список задач')

@section('content')
    <div class="container">
        <h1 class="text-center">Список задач AIMDO</h1>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="mb-3">
            <a href="{{ route('tasks.create') }}" class="btn btn-primary">Создать задачу</a>
            <a href="{{ route('profile.editpr') }}" class="btn btn-info">Личный кабинет</a>
            <a href="{{ route('calendar.index') }}" class="btn btn-calendar">Календарь</a
        </div>

        @if($tasks->isEmpty())
            <div class="alert alert-warning">Нет задач для отображения.</div>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>Название</th>
                        <th class="text-center">Описание</th>
                        <th>Статус</th>
                        <th>Дата создания</th>
                        <th>Степень важности</th>
                        <th>Дедлайн</th>
                        <th>Действия</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tasks as $task)
                        <tr>
                            <td>{{ $task->title }}</td>
                            <td class="description text-center">{{ $task->description }}</td>
                            <td>{{ $task->status }}</td>
                            <td>{{ $task->created_at->format('d.m.Y') }}</td>
                            <td>
                                @if($task->is_important == 0)
                                    😐 Второстепенная задача
                                @elseif($task->is_important == 1)
                                    😊 Средняя важность задачи
                                @else
                                    😃Очень важная задача
                                @endif
                            </td>
                            <td>{{ $task->deadline ? \Carbon\Carbon::parse($task->deadline)->format('d.m.Y') : 'Нет' }}</td>
                            <td>
                                <a href="{{ route('tasks.edit', $task) }}" class="btn btn-warning btn-action">Редактировать</a>
                                <form action="{{ route('tasks.destroy', $task) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Вы уверены, что хотите удалить эту задачу?')">Удалить</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection

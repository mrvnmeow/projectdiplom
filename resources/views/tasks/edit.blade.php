@extends('layouts.edit')

@section('title', 'Редактировать задачу')

@section('content')
<div class="container">
    <h1>Редактировать задачу</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('tasks.update', $task->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Название</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $task->title) }}" required>
        </div>

        <div class="form-group">
            <label for="description">Описание</label>
            <textarea name="description" id="description" class="form-control" required>{{ old('description', $task->description) }}</textarea>
        </div>

        <div class="form-group">
            <label for="status">Статус:</label>
            <select name="status" id="status" class="form-control" required>
                <option value="в процессе" {{ $task->status == 'в процессе' ? 'selected' : '' }}>В процессе</option>
                <option value="приостановлено" {{ $task->status == 'приостановлено' ? 'selected' : '' }}>Приостановлено</option>
                <option value="завершено" {{ $task->status == 'завершено' ? 'selected' : '' }}>Завершено</option>
            </select>
        </div>

        <div class="form-group">
            <label for="deadline">Дедлайн</label>
            <input type="date" name="deadline" id="deadline" class="form-control" value="{{ old('deadline', $task->deadline ? \Carbon\Carbon::parse($task->deadline)->format('Y-m-d') : '') }}">
        </div>

        <div class="form-group">
            <label>Степень важности:</label><br>
            <label>
                <input type="radio" name="is_important" value="2" {{ $task->is_important == 2 ? 'checked' : '' }}>
                😃 Очень важная задача
            </label>
            <label>
                <input type="radio" name="is_important" value="1" {{ $task->is_important == 1 ? 'checked' : '' }}>
                😊 Средняя важность задачи
            </label>
            <label>
                <input type="radio" name="is_important" value="0" {{ $task->is_important == 0 ? 'checked' : '' }}>
                😐 Второстепенная задача
            </label>
        </div>

        <div class="button-container">
            <button type="submit" class="btn btn-primary">Обновить задачу</button>
            <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Назад к списку задач</a>
        </div>
    </form>
</div>
@endsection

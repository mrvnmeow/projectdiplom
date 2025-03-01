@extends('layouts.create')

@section('title', 'Создание задачи')

@section('content')
    <div class="container">
        <h1 class="page-title">Создать задачу</h1>

        <form action="{{ route('tasks.store') }}" method="POST" class="task-form">
            @csrf

            <div class="form-group">
                <label for="title">Название</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" required>
            </div>

            <div class="form-group">
                <label for="description">Описание</label>
                <textarea name="description" id="description" class="form-control">{{ old('description') }}</textarea>
            </div>

            <div class="form-group">
                <label for="status">Статус</label>
                <select name="status" id="status" class="form-control" required>
                    <option value="В процессе" {{ old('status') == 'В процессе' ? 'selected' : '' }}>В процессе</option>
                    <option value="Приостановлено" {{ old('status') == 'Приостановлено' ? 'selected' : '' }}>Приостановлено</option>
                    <option value="Завершено" {{ old('status') == 'Завершено' ? 'selected' : '' }}>Завершено</option>
                </select>
            </div>

            <div class="form-group">
                <label for="deadline">Дедлайн</label>
                <input type="date" name="deadline" id="deadline" class="form-control" value="{{ old('deadline') }}">
            </div>

            <div class="form-group">
                <label>Степень важности:</label><br>
                <label>
                    <input type="radio" name="is_important" value="2" {{ old('is_important') == 2 ? 'checked' : '' }}>
                    😃 <span>Очень важная задача</span>
                </label>
                <label>
                    <input type="radio" name="is_important" value="1" {{ old('is_important') == 1 ? 'checked' : '' }}>
                    😊 <span>Средняя важность задачи</span>
                </label>
                <label>
                    <input type="radio" name="is_important" value="0" {{ old('is_important') == 0 ? 'checked' : '' }} checked>
                    😐 <span>Второстепенная задача</span>
                </label>
            </div>

            <div class="button-container">
                <button type="submit" class="btn btn-primary">Сохранить задачу</button>
            </div>
        </form>
    </div>
@endsection

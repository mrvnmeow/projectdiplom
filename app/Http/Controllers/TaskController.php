<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::where('user_id', Auth::id())->get();
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:В процессе,Приостановлено,Завершено',
            'deadline' => 'nullable|date',
            'is_important' => 'required|integer|in:0,1,2',
        ]);

        Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
            'deadline' => $request->deadline,
            'is_important' => $request->is_important,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('tasks.index')->with('success', 'Задача успешно добавлена!');
    }

    public function edit(Task $task)
    {
    return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|in:в процессе,приостановлено,завершено', // Убедитесь, что здесь указаны все допустимые значения
            'deadline' => 'nullable|date',
            'is_important' => 'required|integer',
        ]);

        $task->update($request->only('title', 'description', 'status', 'deadline', 'is_important'));

        return redirect()->route('tasks.index')->with('success', 'Задача успешно обновлена!');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Задача успешно удалена!');
    }
}

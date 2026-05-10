<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TaskController extends Controller
{
    // index
    public function index()
    {
        $tasks = Task::latest()->get();
        return Inertia::render('Tasks/Index', [
            'tasks' => $tasks,
        ]);
    }

    // create
    public function create()
    {
        return Inertia::render('Tasks/Create');
    }

    // store
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:3|max:100',
            'description' => 'required|min:3|max:100',
        ]);

        Task::create(
            $request->all()
        );

        return redirect()->route('task.index')->with('success', 'Task created successfully!');
    }

    // Edit
    public function edit(Task $task)
    {
        return Inertia::render('Tasks/Edit', ['task' => $task]);
    }

    // update
    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title' => 'required|min:3|max:100',
            'description' => 'nullable|min:3|max:100',
        ]);

        $task->update($request->only('title', 'description', 'completed'));

        return redirect()->route('task.index')->with('success', 'Task updated successfully!');
    }

    // delete
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('task.index')->with('success', 'Task deleted success!');
    }
}

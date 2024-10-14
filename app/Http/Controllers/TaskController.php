<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use App\Models\Task;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Requests\CreateTask;
use App\Http\Requests\EditTask;

class TaskController extends Controller
{
    public function index(int $id) {
        $folders = Folder::all();
        $folder = Folder::find($id);
        $tasks = $folder->tasks()->get();
        // $tasks = Task::where('folder_id', $folder->id)->get();

        // return view('tasks', ['folders' => $folders]);
        return Inertia::render('Tasks/Index', [
            'folders' => $folders,
            'folderId' => $id,
            'tasks' => $tasks
        ]);
    }

    public function create(int $id) {
        $folders = Folder::all();

        return Inertia::render('Tasks/Create', [
            'folders' => $folders,
            'folderId' => $id
        ]);
    }

    public function store(CreateTask $request) {
        $folder = Folder::find($request->folder_id);
        $task = new Task();
        $task->title = $request->title;
        $task->due_date = $request->due_date;
        $folder->tasks()->save($task);

        return redirect()->route('tasks.index', [
            'id' => $folder->id
        ]);
    }

    public function edit(int $id, int $task_id) {
        $folders = Folder::all();
        $task = Task::find($task_id);

        return Inertia::render('Tasks/Edit', [
            'folders' => $folders,
            'folderId' => $id,
            'task' => $task,
            'statuses' => Task::STATUS
        ]);
    }

    public function update(EditTask $request, int $id, int $task_id) {
        $task = Task::find($task_id);
        $task->title = $request->title;
        $task->status = $request->status;
        $task->due_date = $request->due_date;
        $task->save();

        return redirect()->route('tasks.index', [
            'id' => $id
        ]);
    }

    public function delete(int $id, int $task_id) {
        $folders = Folder::all();
        $task = Task::find($task_id);

        return Inertia::render('Tasks/Delete', [
            'folders' => $folders,
            'folderId' => $id,
            'task' => $task,
            'statuses' => Task::STATUS
        ]);
    }

    public function destroy(int $id, int $task_id) {
        $task = Task::find($task_id);
        $task->delete();

        return redirect()->route('tasks.index', [
            'id' => $id
        ]);
    }
}
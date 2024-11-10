<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::with(['category', 'tags'])->get();
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('tasks.create', compact('categories', 'tags'));
    }

    public function store(Request $request)
    {
        DB::transaction(function () use ($request) {
            $task = Task::create($request->all());
            $task->tags()->attach($request->input('tags'));
        });

        return redirect()->route('tasks.index');
    }

    public function show($id)
    {
        $task = Task::with(['category', 'tags', 'comments'])->findOrFail($id);
        return view('tasks.show', compact('task'));
    }

    public function edit($id)
    {
        $task = Task::findOrFail($id);
        $categories = Category::all();
        $tags = Tag::all();
        return view('tasks.edit', compact('task', 'categories', 'tags'));
    }

    public function update(Request $request, $id)
    {
        DB::transaction(function () use ($request, $id) {
            $task = Task::findOrFail($id);
            $task->update($request->all());
            $task->tags()->sync($request->input('tags'));
        });

        return redirect()->route('tasks.index');
    }

    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
        return redirect()->route('tasks.index');
    }

    public function addComment(Request $request, $taskId)
    {
        $task = Task::findOrFail($taskId);
        $task->comments()->create($request->all());
        return redirect()->route('tasks.show', $taskId);
    }
}
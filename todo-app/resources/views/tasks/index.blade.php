@extends('layouts.app')

@section('content')
    <div class="task-list-container">
        <h1 class="task-list-title">Tasks</h1>
        <ul class="task-list">
            @foreach ($tasks as $task)
                <li class="task-list-item">
                    <a href="{{ route('tasks.show', $task->id) }}" class="task-list-link">{{ $task->title }}</a>
                    <p class="task-category">Category: {{ $task->category->name }}</p>
                    <p class="task-tags">Tags: 
                        @foreach ($task->tags as $tag)
                            <span class="task-tag">{{ $tag->name }}</span>
                        @endforeach
                    </p>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
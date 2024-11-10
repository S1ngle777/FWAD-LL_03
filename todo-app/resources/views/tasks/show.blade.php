@extends('layouts.app')

@section('content')
    <div class="task-detail-container">
        <h1 class="task-detail-title">{{ $task->title }}</h1>
        <p class="task-detail-description">{{ $task->description }}</p>
        <p class="task-detail-category">Category: {{ $task->category->name }}</p>
        <p class="task-detail-tags">Tags: 
            @foreach ($task->tags as $tag)
                <span class="task-detail-tag">{{ $tag->name }}</span>
            @endforeach
        </p>
        <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-secondary">Edit</a>
        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="task-delete-form">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>

        <div class="task-comments-container">
            <h2>Comments</h2>
            <ul class="task-comments">
                @foreach ($task->comments as $comment)
                    <li class="task-comment">{{ $comment->content }}</li>
                @endforeach
            </ul>
            <form action="{{ route('tasks.addComment', $task->id) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="content" class="form-label">Add Comment:</label>
                    <textarea name="content" id="content" class="form-textarea"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Add Comment</button>
            </form>
        </div>
    </div>
@endsection
@extends('layouts.app')

@section('content')
    <div class="edit-task-container">
        <h1 class="edit-task-title">Edit Task</h1>
        <form action="{{ route('tasks.update', $task->id) }}" method="POST" class="edit-task-form">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title" class="form-label">Title:</label>
                <input type="text" name="title" id="title" value="{{ $task->title }}" class="form-input">
            </div>
            <div class="form-group">
                <label for="description" class="form-label">Description:</label>
                <textarea name="description" id="description" class="form-textarea">{{ $task->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="category_id" class="form-label">Category:</label>
                <select name="category_id" id="category_id" class="form-select">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $task->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="tags" class="form-label">Tags:</label>
                <select name="tags[]" id="tags" class="form-select" multiple>
                    @foreach ($tags as $tag)
                        <option value="{{ $tag->id }}" {{ $task->tags->contains($tag->id) ? 'selected' : '' }}>{{ $tag->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
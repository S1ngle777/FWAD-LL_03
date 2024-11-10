@extends('layouts.app')

@section('content')
    <div class="create-task-container">
        <h1 class="create-task-title">Create Task</h1>
        <form action="{{ route('tasks.store') }}" method="POST" class="create-task-form">
            @csrf
            <div class="form-group">
                <label for="title" class="form-label">Title:</label>
                <input type="text" name="title" id="title" class="form-input">
            </div>
            <div class="form-group">
                <label for="description" class="form-label">Description:</label>
                <textarea name="description" id="description" class="form-textarea"></textarea>
            </div>
            <div class="form-group">
                <label for="category_id" class="form-label">Category:</label>
                <select name="category_id" id="category_id" class="form-select">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="tags" class="form-label">Tags:</label>
                <select name="tags[]" id="tags" class="form-select" multiple>
                    @foreach ($tags as $tag)
                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
@extends('layouts.app')

@section('title', 'Home')

@section('header', 'To-Do App для команд')

@section('content')

    <div class="home-container">
        <h1>Приветственное сообщение</h1>
        <p>Добро пожаловать в To-Do App для команд. Управляйте своими задачами легко и эффективно.</p>
        <h3>Навигация</h3>
        <ul>
            <li><a href="{{ route('tasks.index') }}">Список задач</a></li>
            <li><a href="{{ route('tasks.create') }}">Создание задачи</a></li>
        </ul>
        <h3>Информация о приложении</h3>
        <p>To-Do App позволяет вам создавать, редактировать и управлять задачами. Вы можете назначать задачи членам команды, устанавливать приоритеты и отслеживать прогресс.</p>
    </div>
@endsection
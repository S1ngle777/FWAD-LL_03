@props(['task'])

<div class="border p-4 rounded-lg shadow-md">
    <h2 class="text-xl font-bold">{{ $task['title'] }}</h2>
    <p>{{ $task['description'] }}</p>
    <p class="text-sm text-gray-500">Дата создания: {{ $task['created_at'] }}</p>
    <p class="text-sm text-gray-500">Дата обновления: {{ $task['updated_at'] }}</p>
    <p>Статус: {{ $task['status'] ? 'Выполнена' : 'Не выполнена' }}</p>
    <p>Приоритет: {{ $task['priority'] }}</p>
    <p>Исполнитель: {{ $task['assignment'] }}</p>
</div>
<?php

namespace Database\Seeders;

use App\Models\Tag;
use App\Models\Task;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaskTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tasks = Task::all();
        $tags = Tag::all();

        foreach ($tasks as $task) {
            $task->tags()->attach(
                $tags->random(rand(1, 3))->pluck('id')->toArray()
            );
        }
    }
}

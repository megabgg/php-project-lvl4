<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaskLabelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $labels = \App\Models\Label::pluck('id')->toArray();
        $tasks = \App\Models\Task::pluck('id')->toArray();

        foreach ($labels as $labelId) {
            foreach ($tasks as $taskId) {
                \App\Models\TaskLabel::query()->insert(['task_id' => $taskId, 'label_id' => $labelId]);
            }
        }
    }
}

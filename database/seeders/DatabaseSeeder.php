<?php

namespace Database\Seeders;

use App\Models\TaskStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(TaskStatusSeeder::class);
        $this->call(LabelSeeder::class);
        $this->call(TaskSeeder::class);
        $this->call(TaskLabelSeeder::class);
    }
}

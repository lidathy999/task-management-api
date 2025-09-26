<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\TaskPriority;

class TaskPrioritySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        TaskPriority::truncate();
        
        $taskPriorities = [
            ['name' => 'Low', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Medium', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'High', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Critical', 'created_at' => now(), 'updated_at' => now()],
        ];

        TaskPriority::insert($taskPriorities);
    }
}

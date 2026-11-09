<?php

namespace Database\Seeders;

use App\Models\Tasks;
use App\Models\User;
use App\Models\Users;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaskCompletionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $task = Tasks::where('title', 'Membuat Aplikasi CRUD')
            ->value('id');

        $student = User::where('email', 'siswa1@gmail.com')
            ->value('id');

        DB::table('task_completions')->insert([
            [
                'task_id' => $task,
                'student_id' => $student,
                'completed_at' => now(),
            ],
        ]);
    }
}

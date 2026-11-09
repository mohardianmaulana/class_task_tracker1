<?php

namespace Database\Seeders;

use App\Models\Classes;
use App\Models\Tasks;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $teacher = User::where('email', 'guru1@gmail.com')
            ->value('id');

        $class1 = Classes::where('name', 'XII RPL 1')
            ->value('id');

        $class2 = Classes::where('name', 'XII RPL 2')
            ->value('id');

        Tasks::create([
            'teacher_id' => $teacher,
            'class_id' => $class1,
            'title' => 'Membuat Aplikasi CRUD',
            'description' => 'Buat aplikasi CRUD menggunakan Laravel dan MySQL.',
            'deadline' => Carbon::now()->addDays(7),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Tasks::create([
            'teacher_id' => $teacher,
            'class_id' => $class1,
            'title' => 'Mempelajari REST API',
            'description' => 'Pelajari konsep REST API dan implementasikan endpoint sederhana.',
            'deadline' => Carbon::now()->addDays(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Tasks::create([
            'teacher_id' => $teacher,
            'class_id' => $class2,
            'title' => 'Membuat Database Sekolah',
            'description' => 'Buat desain database relasional untuk sistem sekolah.',
            'deadline' => Carbon::now()->addDays(5),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}

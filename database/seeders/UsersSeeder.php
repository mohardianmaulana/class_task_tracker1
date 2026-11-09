<?php

namespace Database\Seeders;

use App\Models\Classes;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $class1 = Classes::where('name', 'XII RPL 1')->value('id');
        $class2 = Classes::where('name', 'XII RPL 2')->value('id');

        // Akun Guru
        User::create([
                'name' => 'Budi Santoso',
                'email' => 'guru1@gmail.com',
                'password' => Hash::make('password123'),
                'role' => 'guru',
                'class_id' => null,
        ]);
        User::create([
                'name' => 'Siti Aminah',
                'email' => 'guru2@gmail.com',
                'password' => Hash::make('password123'),
                'role' => 'guru',
                'class_id' => null,
        ]);

        // Akun Siswa
        User::create([
                'name' => 'Andi Pratama',
                'email' => 'siswa1@gmail.com',
                'password' => Hash::make('password123'),
                'role' => 'siswa',
                'class_id' => $class1,
        ]);
        User::create([
                'name' => 'Dewi Lestari',
                'email' => 'siswa2@gmail.com',
                'password' => Hash::make('password123'),
                'role' => 'siswa',
                'class_id' => $class1,
        ]);
        User::create([
                'name' => 'Rizky Firmansyah',
                'email' => 'siswa3@gmail.com',
                'password' => Hash::make('password123'),
                'role' => 'siswa',
                'class_id' => $class2,
        ]);
    }
}

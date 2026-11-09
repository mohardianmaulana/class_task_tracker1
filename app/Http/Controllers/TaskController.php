<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Tasks;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController {
    public function index(Request $request) {
        try {
            $user = Auth::user();
            $query = Tasks::with(['class', 'teacher']);

            if ($request->has('class_id')) {
                $query->where('class_id', $request->class_id);
            }

            if ($user->role === 'siswa') {
                $query->where('class_id', $user->class_id);

            } elseif ($user->role === 'guru') {
                $query->where('teacher_id', $user->id);
            }

            $tasks = $query->get();

            return response()->json([
                'success' => true,
                'message' => 'Daftar tugas berhasil diambil.',
                'data'    => $tasks,
            ], 200);

        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal mengambil daftar tugas.',
            ], 500);
        }
    }

    public function acceptTask(Request $request, $id) {
        try {
            $task = Tasks::find($id);

            if (!$task) {
                return response()->json([
                    'success' => false,
                    'message' => 'Tugas tidak ditemukan.',
                ], 404);
            }

            // 2. Ambil ID user yang sedang login (harus role siswa)
            $user = $request->user();

            // Opsional: Validasi pastikan yang akses adalah siswa
            if ($user->role !== 'siswa') {
                return response()->json([
                    'success' => false,
                    'message' => 'Akses ditolak. Hanya siswa yang dapat menerima/mengerjakan tugas.',
                ], 403);
            }

            $completion = $task->completions()->firstOrCreate(
                [
                    'student_id' => $user->id,
                ],
                [
                    'completed_at' => now(),
                ]
            );

            return response()->json([
                'success' => true,
                'message' => 'Tugas berhasil diterima/dikumpulkan.',
                'data'    => $completion,
            ], 200);

        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal memproses tugas.',
            ], 500);
        }
    }

    public function store(TaskRequest $request) {
        try {
            $validated = $request->validated();

            $validated['teacher_id'] = Auth::id(); 

            $task = Tasks::create($validated);

            return response()->json([
                'success' => true,
                'message' => 'Tugas berhasil dibuat.',
                'data'    => $task,
            ], 201);
        } catch(Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal membuat tugas.',
                'error'   => $e->getMessage(),
            ], 500);
        }
    }

    public function update(TaskRequest $request, $id) {
        try {
            $task = Tasks::find($id);

            if (!$task) {
                return response()->json([
                    'success' => false,
                    'message' => 'Tugas tidak ditemukan.',
                ], 404);
            }

            $validated = $request->validated();

            $task->update($validated);

            return response()->json([
                'success' => true,
                'message' => 'Tugas berhasil diperbarui.',
                'data'    => $task,
            ], 200);

        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal memperbarui tugas.',
            ], 500);
        }
    }

    public function delete($id) {
        try {
            $task = Tasks::find($id);

            if (!$task) {
                return response()->json([
                    'success' => false,
                    'message' => 'Tugas tidak ditemukan.',
                ], 404);
            }

            $task->delete();

            return response()->json([
                'success' => true,
                'message' => 'Tugas berhasil dihapus.',
            ], 200);

        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menghapus tugas.',
            ], 500);
        }
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskCompletions extends Model
{
    use HasFactory;

    protected $table = 'task_completions';

    protected $fillable = [
        'task_id',
        'student_id',
        'completed_at',
    ];

    protected static function newFactory()
    {
        return \Modules\Pinjaman\Database\factories\TaskCompletions::new();
    }

    public function task()
    {
        return $this->belongsTo(Tasks::class, 'task_id');
    }

    public function student()
    {
        return $this->belongsTo(Users::class, 'student_id')
                    ->where('role', 'siswa');
    }
}

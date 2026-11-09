<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
    use HasFactory;

    protected $table = 'tasks';

    protected $fillable = [
        'class_id',
        'teacher_id',
        'title',
        'description',
        'deadline',
    ];

    protected static function newFactory()
    {
        return \Modules\Pinjaman\Database\factories\TasksFactory::new();
    }

    public function class()
    {
        return $this->belongsTo(Classes::class, 'class_id');
    }

    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    public function completions()
    {
        return $this->hasMany(TaskCompletions::class, 'task_id');
    }
}

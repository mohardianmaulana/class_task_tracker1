<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    use HasFactory;

    protected $table = 'classes';

    protected $fillable = [
        'name',
    ];

    // Agar Laravel tidak mencari kolom updated_at
    public $timestamps = false;

    protected static function newFactory()
    {
        return \Modules\Pinjaman\Database\factories\ClassesFactory::new();
    }

    public function students()
    {
        return $this->hasMany(Users::class, 'class_id')
                    ->where('role', 'siswa');
    }

    public function tasks()
    {
        return $this->hasMany(Tasks::class, 'class_id');
    }
}

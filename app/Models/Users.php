<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Users extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'users';

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'class_id',
    ];

    // Agar Laravel tidak mencari kolom updated_at
    public $timestamps = false;

    protected static function newFactory()
    {
        return \Modules\Pinjaman\Database\factories\UsersFactory::new();
    }

    public function class()
    {
        return $this->belongsTo(Classes::class, 'class_id');
    }
}

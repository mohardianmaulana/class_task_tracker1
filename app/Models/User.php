<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'user';
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'class_id',
    ];

    protected $hidden = [
        'password',
    ];

    public $timestamps = false;

    public function class()
    {
        return $this->belongsTo(Classes::class, 'class_id');
    }
}
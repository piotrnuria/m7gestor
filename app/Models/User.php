<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'users';
    protected $primaryKey = 'id_user';
    public $timestamps = false;

    protected $fillable = [
        'name',
        'email',
        'password',
        'rol',
    ];

    // Relación muchos a muchos con la tabla modulos a través de la tabla alumno_modulo
    public function modulos()
    {
        return $this->belongsToMany(Modulo::class, 'alumno_modulo', 'id_user', 'id_modulo');
    }

    // Relación muchos a muchos con la tabla modulos a través de la tabla profe_modulo
    public function modulosAsignados()
    {
        return $this->belongsToMany(Modulo::class, 'profe_modulo', 'id_user', 'id_modulo');
    }
}

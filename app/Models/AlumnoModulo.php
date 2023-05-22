<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlumnoModulo extends Model
{
    protected $table = 'alumno_modulo';
    protected $primaryKey = 'id';
    public $timestamps = false;

    // Relación con el modelo User
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }

    // Relación con el modelo Modulo
    public function modulo()
    {
        return $this->belongsTo(Modulo::class, 'id_modulo', 'id_modulo');
    }

}

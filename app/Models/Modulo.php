<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modulo extends Model
{
    protected $table = 'modulos';
    protected $primaryKey = 'id_modulo';
    public $timestamps = false;

    // Relación muchos a muchos con la tabla users a través de la tabla alumno_modulo
    public function alumnos()
    {
        return $this->belongsToMany(User::class, 'alumno_modulo', 'id_modulo', 'id_user');
    }

    // Relación muchos a muchos con la tabla users a través de la tabla profe_modulo
    public function profesores()
    {
        return $this->belongsToMany(User::class, 'profe_modulo', 'id_modulo', 'id_user');
    }

    // Relación uno a uno con la tabla unidadformativa a través de la tabla uf_modulo
    public function unidadFormativa()
    {
        return $this->hasOne(UnidadFormativa::class, 'id_modulo');
    }
}

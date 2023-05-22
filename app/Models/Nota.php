<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    protected $table = 'notas';
    protected $primaryKey = 'id_nota';
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

    // Relación con la tabla unidadFormativa
    public function unidadFormativa()
    {
        return $this->belongsTo(UnidadFormativa::class, 'id_uf', 'id_uf');
    }
}

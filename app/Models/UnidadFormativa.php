<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnidadFormativa extends Model
{
    protected $table = 'unidad_formativa';
    protected $primaryKey = 'id_uf';
    public $timestamps = false;

    // Relación uno a uno inversa con la tabla modulos a través de la tabla uf_modulo
    public function modulo()
    {
        return $this->belongsTo(Modulo::class, 'id_modulo');
    }
}

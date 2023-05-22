<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Modulo;
use App\Models\UnidadFormativa;


class ModuloUF extends Model
{
    use HasFactory;

    protected $table = 'uf_modulo';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'id_modulo',
        'id_uf',
    ];

    public function modulo()
    {
        return $this->belongsTo(Modulo::class, 'id_modulo');
    }

    public function unidadFormativa()
    {
        return $this->belongsTo(UnidadFormativa::class, 'id_uf');
    }
}

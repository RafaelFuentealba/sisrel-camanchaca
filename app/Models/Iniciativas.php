<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Iniciativas extends Model
{
    protected $table = 'iniciativas';

    public $timestamps = false;

    protected $fillable = [
        'inic_codigo',
        'inic_nombre',
        'inic_objetivo_dec',
        'inic_fecha_inicio',
        'inic_fecha_fin',
        'frec_codigo',
        'foim_codigo',
        'inic_nombre_responsable',
        'inic_cargo_responsable',
        'meca_codigo',
        'inic_inrel',
        'inic_creado',
        'inic_actualizado',
        'inic_vigente',
        'inic_usuario_mod'
    ];
}

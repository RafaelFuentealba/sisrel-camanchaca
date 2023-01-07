<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoOrganizacion extends Model
{
    use HasFactory;

    protected $table = 'tipo_organizaciones';

    public $timestamps = false;

    protected $fillable = [
        'tior_codigo',
        'tior_nombre',
        'tior_ruta_icono',
        'tior_creado',
        'tior_actualizado',
        'tior_vigente',
        'tior_usuario_mod'
    ];
}

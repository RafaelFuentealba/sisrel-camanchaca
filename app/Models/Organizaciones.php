<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organizaciones extends Model
{
    use HasFactory;

    protected $table = 'organizaciones';

    public $timestamps = false;

    protected $fillable = [
        'orga_codigo',
        'comu_codigo',
        'tior_codigo',
        'orga_nombre',
        'orga_descripcion',
        'orga_geoubicacion',
        'orga_creado',
        'orga_actualizado',
        'orga_vigente',
        'orga_usuario_mod',
    ];
}

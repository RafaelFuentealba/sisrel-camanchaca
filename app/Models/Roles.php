<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    use HasFactory;

    protected $table = 'roles_usuarios';

    public $timestamps = false;

    protected $fillable = [
        'rous_codigo',
        'rous_nombre',
        'rous_creado',
        'rous_actualizado',
        'rous_vigente',
        'rous_usuario_mod',
    ];
}

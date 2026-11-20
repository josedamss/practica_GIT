<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Empleados extends Model
{
    /** @use HasFactory<\Database\Factories\EmpleadosFactory> */
    use HasFactory;

    protected $table = 'empleados';

    protected $fillable = [
        'codigo_empleado',
        'nombre',
        'apellido',
        'email',
        'cargo',
        'fecha_contratacion',
        'estado',
    ];

    public function pedios(): HasMany
    {
        return $this->hasMany(
            Pedios::class,
            'empleado_id',
            'id'
        );
    }
}


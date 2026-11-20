<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pedios extends Model
{
    /** @use HasFactory<\Database\Factories\PediosFactory> */
    use HasFactory;

    protected $table = 'pedios';

    protected $fillable = [
        'cliente_id',
        'empleado_id',
        'numero_pedido',
        'fecha_pedido',
        'fecha_entrega',
        'total',
        'estado',
        'observaciones',
    ];

    public function cliente(): BelongsTo
    {
        return $this->belongsTo(Clientes::class, 'cliente_id', 'id');
    }

    public function empleado(): BelongsTo
    {
        return $this->belongsTo(Empleados::class, 'empleado_id', 'id');
    }
}


<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Clientes extends Model
{
    /** @use HasFactory<\Database\Factories\ClientesFactory> */
    use HasFactory;

    use SoftDeletes;
    
    protected $table = 'clientes';

    protected $fillable = [
        'codigo_cliente',
        'nombre',
        'apellido',
        'email',
        'telefono',
        'direccion',
        'estado',
    ];

    public function pedios(): HasMany
    {
        return $this->hasMany(
            Pedios::class,
            'cliente_id',
            'id'
        );
    }
}


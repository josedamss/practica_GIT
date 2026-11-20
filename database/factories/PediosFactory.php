<?php

namespace Database\Factories;

use App\Models\Pedios;
use App\Models\Clientes;
use App\Models\Empleados;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Pedios>
 */
class PediosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $fechaPedido = $this->faker->dateTimeBetween(
            '-1 month',
            'now'
        );

        $fechaEntrega = (clone $fechaPedido)->modify('+7 days');

        return [
            'cliente_id'    => Clientes::inRandomOrder()->firstOrFail()->id,
            'empleado_id'   => Empleados::inRandomOrder()->firstOrFail()->id,
            'numero_pedido' => $this->faker->unique()->numerify('PED-#####'),
            'fecha_pedido'  => $fechaPedido->format('Y-m-d'),
            'fecha_entrega' => $fechaEntrega->format('Y-m-d'),
            'total'         => $this->faker->randomFloat(2, 100, 20000),
            'estado'        => $this->faker->randomElement([
                'pendiente',
                'procesando',
                'enviado',
                'entregado',
            ]),
            'observaciones' => $this->faker->sentence(),
        ];
    }
}

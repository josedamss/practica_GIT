<?php

namespace Database\Factories;

use App\Models\Empleados;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Empleados>
 */
class EmpleadosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'codigo_empleado'    => $this->faker->unique()->numerify('E-#####'),
            'nombre'             => $this->faker->firstName(),
            'apellido'           => $this->faker->lastName(),
            'email'              => $this->faker->unique()->safeEmail(),
            'cargo'              => $this->faker->jobTitle(),
            'fecha_contratacion' => $this->faker
                ->dateTimeBetween('-5 years', 'now')
                ->format('Y-m-d'),
            'estado'             => $this->faker->randomElement([
                'activo',
                'inactivo',
            ]),
        ];
    }
}

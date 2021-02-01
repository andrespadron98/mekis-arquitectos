<?php

namespace Database\Factories;

use App\Models\Proyectos;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProyectosFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Proyectos::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->word,
        'comuna' => $this->faker->word,
        'ciudad' => $this->faker->word,
        'descripcion' => $this->faker->word,
        'habitaciones' => $this->faker->randomDigitNotNull,
        'metros_cuadrados_terreno' => $this->faker->randomDigitNotNull,
        'piscina' => $this->faker->randomDigitNotNull,
        'jacuzzi' => $this->faker->randomDigitNotNull,
        'estacionamientos' => $this->faker->randomDigitNotNull,
        'img_previsualizacion' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\Contactos;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactosFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Contactos::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->word,
        'celular' => $this->faker->word,
        'correo' => $this->faker->word,
        'cuentanos' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}

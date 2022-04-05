<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ClienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'razon_social' => $this->faker->company(),
            'calle' => $this->faker->streetName(),
            'numero_exterior' => $this->faker->buildingNumber(),
            'colonia' => $this->faker->citySuffix(),
            'codigo_postal' => $this->faker->postcode(),
            'estado' => $this->faker->state(),
            'ciudad' => $this->faker->citySuffix(),
            'latitud' => $this->faker->latitude(),
            'longitud' => $this->faker->longitude(),
            
        ];
    }
}


 
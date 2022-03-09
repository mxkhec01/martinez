<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class UnidadFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'codigo'=>$this->faker->numerify('COD-####'),
            'nombre'=>$this->faker->words(3,true),
            'placas'=>$this->faker->bothify('???-####'),
            'tipo_unidad'=>$this->faker->randomElement([ 'torton','1.5 Tons','Trailer']),
        ];
    }
}

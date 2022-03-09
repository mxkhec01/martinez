<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class OperadorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {


        return [
            'nombre'=>$this->faker->name(),
            //'fecha_nacimiento'=>now(),
            //'fecha_ingreso'=>now(),
            'licencia'=>$this->faker->phoneNumber(),
            //'vence'=>         now(),
            'tipo_licencia'=>$this->faker->randomElement([ 'Licencia A','Licencia B']),
            'imss'=>$this->faker->md5(),
            'rfc'=>$this->faker->md5(),
            'curp'=>$this->faker->sha1(),
            'tarjeta_bancaria'=>$this->faker->creditCardNumber(),
            'banco'=>$this->faker->creditCardType(),
        ];
    }
}

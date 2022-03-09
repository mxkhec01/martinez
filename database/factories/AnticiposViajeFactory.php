<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

class AnticiposViajeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'monto' => $this->faker->randomFloat(2, 300, 1500),
            'descripcion' => $this->faker->words(4,true),
            'fecha' => Carbon::createFromDate($this->faker->dateTimeBetween('-25 days', '-1 days'))->format('d-m-Y'),
        ];
    }
}

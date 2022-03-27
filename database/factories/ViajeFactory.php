<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

class ViajeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $estado = $this->faker->randomElement([
            'activo' ,
            'revision'  ,
            'asignar' ,
            'finalizado',]);

        if($estado=='finalizado'||$estado=='revision'){
            $monto_pagado = $this->faker->randomFloat(2, 300, 1500);
            $fecha_pago = Carbon::createFromDate($this->faker->dateTimeBetween('-30 days', '-1 days'))->format('Y-m-d');
            return [

                'destino' => $this->faker->city(),
                'estado' => $estado,
                'monto_pagado' => $monto_pagado,
                'fecha_pago' => $fecha_pago,
            ];


        }


        return [

            'estado' => $estado,
            'destino' => $this->faker->city(),
        ];
    }
}

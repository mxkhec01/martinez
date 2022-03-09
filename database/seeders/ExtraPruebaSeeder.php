<?php

namespace Database\Seeders;

use App\Models\Cliente;
use App\Models\Unidad;
use App\Models\Operador;
use App\Models\Viaje;
use App\Models\AnticiposViaje;
use Illuminate\Database\Seeder;

class ExtraPruebaSeeder extends Seeder
{
    public function run()
    {
        
        $clientes = Cliente::factory(10)->create();

        $unidades =  Unidad::factory(40)->create();

        $operadores =  Operador::factory(35)->create();

        $viajes   = Viaje::factory(100)
            ->make()
            ->each(function($viaje) use ($clientes, $unidades, $operadores) {
                $viaje->cliente_id = $clientes->random()->id;
                $viaje->unidad_id = $unidades->random()->id;
                $viaje->operador_id = $operadores->random()->id;
                $viaje->save();
            } ) ;  

        $anticipos = AnticiposViaje::factory(80)
            ->make()
            ->each(function($anticipo) use ($viajes) {
                $anticipo->viaje_id = $viajes->random()->id;
                $anticipo->save();
            } );
        
    }
}
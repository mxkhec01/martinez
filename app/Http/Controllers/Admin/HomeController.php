<?php

namespace App\Http\Controllers\Admin;

use App\Models\Viaje;
use App\Models\Unidad;
use App\Models\AnticiposViaje;
use App\Models\Operador;
use DB;
use Carbon\Carbon;

class HomeController
{
    public function index()
    {

        /*query para el dashboard */

        $viajesEstatus = Viaje::selectRaw('estado, count(1) AS numero')
        ->groupBy('estado')
        ->get();

        $settings1 = [
            'chart_title'           => 'Unidades disponibles',
            'chart_type'            => 'latest_entries',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\Models\Unidad',
            'group_by_field'        => 'created_at',
            'group_by_period'       => 'day',
            'aggregate_function'    => 'count',
            'filter_field'          => 'created_at',
            'filter_days'           => '7',
            'group_by_field_format' => 'd/m/Y H:i:s',
            'column_class'          => 'col-md-6',
            'entries_number'        => '5',
            'fields'                => [
                'codigo'           => '',
                'nombre'           => '',
                'tipo_unidad'   => '',
            ],
            'translation_key' => 'unidad',
        ];


        $settings1['data'] = [];
        if (class_exists($settings1['model'])) {
            $settings1['data'] = $settings1['model']::whereDoesntHave('viajes', function (\Illuminate\Database\Eloquent\Builder $query) {
                $query->where('estado',  'activo');
            })->get();
            }




        if (!array_key_exists('fields', $settings1)) {
            $settings1['fields'] = [];
        }

        $settings2 = [
            'chart_title'           => 'Choferes disponibles',
            'chart_type'            => 'latest_entries',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\Models\Operador',
            'group_by_field'        => 'created_at',
            'group_by_period'       => 'day',
            'aggregate_function'    => 'count',
            'filter_field'          => 'created_at',
            'filter_days'           => '7',
            'group_by_field_format' => 'd/m/Y H:i:s',
            'column_class'          => 'col-md-6',
            'entries_number'        => '5',
            'fields'                => [
                'nombre'           => '',
                'licencia'           => '',
                'tipo_licencia'   => '',
            ],
            'translation_key' => 'operador',
        ];

        $settings2['data'] = [];
        if (class_exists($settings2['model'])) {
            $settings2['data'] = $settings2['model']::whereDoesntHave('viajes', function (\Illuminate\Database\Eloquent\Builder $query) {
                $query->where('estado',  'activo');
            })->get();
            }

        if (!array_key_exists('fields', $settings2)) {
            $settings2['fields'] = [];
        }

        //función para traer los últimos 21 días para la gráfica

        $dias = array();
        for($i = 21; $i >= 0; $i--)
            $dias[] = date("Y-m-d", strtotime('-'. $i .' days'));

            $pagos = [];
            foreach ($dias as $key => $dia) {
                $maniana= Carbon::parse($dia);
                $pagos[] = Viaje::where('fecha_pago','>=',$dia)
                                ->where('fecha_pago','<',$maniana->addDay())
                                ->sum('monto_pagado');

                $anticipos [] = AnticiposViaje::where('fecha','>=',$dia)
                                ->where('fecha','<',$maniana)  //ya no se le suma el día
                                ->sum('monto');
            }

            $valor = Unidad::selectRaw('sum(case when viajes.id is null then 0 else 1 end) as numero, codigo')
                ->leftJoin('viajes', function ($leftJoin) use($dias) {
                    $leftJoin
                        ->on('unidads.id', '=', 'viajes.unidad_id')
                        ->on('viajes.created_at','>=',DB::raw($dias[0]));
                })
                ->groupBy('codigo')
                ->orderBy('numero','desc')
                ->get();

                $unidades= $valor->pluck('codigo');
                $viajesUnidad = $valor->pluck('numero');

            $pagos_viajes = Operador::selectRaw('ifnull(sum(case when viajes.id is null then 0 else viajes.monto_pagado end),0) as monto, nombre')
                ->leftJoin('viajes', function ($leftJoin) use($dias) {
                    $leftJoin
                        ->on('operadors.id', '=', 'viajes.operador_id')
                        ->on('viajes.created_at','>=',DB::raw($dias[0]));
                })
                ->groupBy('nombre')
                ->orderBy('monto','desc')
                ->get();

                $operadores = $pagos_viajes->pluck('nombre');
                $monto_operadores = $pagos_viajes->pluck('monto');



        $pagos = json_encode($pagos,JSON_NUMERIC_CHECK);
        $dias  = json_encode($dias ,JSON_NUMERIC_CHECK);
        $unidades = json_encode($unidades,JSON_NUMERIC_CHECK);
        $viajesUnidad = json_encode($viajesUnidad ,JSON_NUMERIC_CHECK);
        $anticipos = json_encode($anticipos ,JSON_NUMERIC_CHECK);
        //dd($dias);


        return view('home', compact('viajesEstatus', 'settings1','settings2','pagos','dias','unidades','viajesUnidad','anticipos','operadores','monto_operadores'));

        //return view('home');
    }
}

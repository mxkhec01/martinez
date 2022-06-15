<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use App\Models\Viaje;

class EntregasRecientes extends AbstractWidget
{
    
    public $reloadTimeout = 10;
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [
        'escondidos' => 0,
    ];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        //
        if ($this->config['escondidos'] == 0 ) {
            $viajes = Viaje::with([ 'unidad', 'operador'])
            ->where('estado','=','activo')
            ->whereNull('fecha_pago')
            ->get();
        }
        else
        {
            $viajes = Viaje::with([ 'unidad', 'operador'])
            ->where('estado','=','activo')
            ->get();
        }

        return view('widgets.entregas_recientes', [
            'config' => $this->config,
            'viajes' => $viajes,
        ]);
    }
}

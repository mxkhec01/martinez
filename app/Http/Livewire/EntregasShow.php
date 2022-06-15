<?php

namespace App\Http\Livewire;

use App\Models\Viaje;
use Livewire\Component;

class EntregasShow extends Component
{
    public $viajes;
    public $ismuestraEscondidos = false;

    public function mount()
    {

        $this->viajes = Viaje::with([ 'unidad', 'operador'])
        ->where('estado','=','activo')
        ->whereNull('fecha_pago')
        ->get();
    }

    public function render()
    {

        return view('livewire.entregas-show',['viajes' => $this->viajes,]);
    }

    public function oculta_viaje($viaje_id)
    {
        
        Viaje::where('id',$viaje_id)->update(['fecha_pago'=>now()]);
        $this->viajes->fresh();
      
    }

    public function pinta(){
        if ($this->ismuestraEscondidos ==false) {
            $this->viajes = Viaje::with([ 'unidad', 'operador'])
            ->where('estado','=','activo')
            ->whereNull('fecha_pago')
            ->get();
        } else {
            $this->viajes = Viaje::with([ 'unidad', 'operador'])
            ->where('estado','=','activo')
            ->get();
        }
    }

    public function muestraEscondidos(){
        $this->ismuestraEscondidos == false ? $this->ismuestraEscondidos = true : $this->ismuestraEscondidos = false;
        $this->pinta();

    }
}

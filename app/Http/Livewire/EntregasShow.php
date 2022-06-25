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
        ->where('esconder',0)
        ->get();
    }

    public function render()
    {

        return view('livewire.entregas-show',['viajes' => $this->viajes,]);
    }

    public function oculta_viaje($viaje_id)
    {
        
        $viaje_ocultar = Viaje::find($viaje_id);

        

        if ($viaje_ocultar->esconder == 0) {
            $viaje_ocultar->esconder = 1;
        } else{
            $viaje_ocultar->esconder = 0;
        }


        $viaje_ocultar->save();
        // Viaje::where('id',$viaje_id)->update(['fecha_pago'=>now()]);
        $this->viajes->fresh();
      
    }

    public function pinta(){
        if ($this->ismuestraEscondidos == false) {
            $this->viajes = Viaje::with([ 'unidad', 'operador'])
            ->where('estado','=','activo')
            ->where('esconder',0)
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

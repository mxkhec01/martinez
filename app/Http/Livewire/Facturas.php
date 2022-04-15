<?php

namespace App\Http\Livewire;

use App\Models\Entrega;
use App\Models\Factura;
use Livewire\Component;
use phpDocumentor\Reflection\Types\Null_;

class Facturas extends Component
{
    public $indiceEdicionFactura;
    public $facturas;
    public $entrega;


    public function render()
    {
        //dd($this->entrega);
        if($this->entrega) {
            $this->facturas = $this->entrega->facturas->toArray();
        } else {
            $this->facturas = [];
            }
        return view('livewire.facturas',['facturas',$this->facturas
        ]);
    }

    public function editFactura($facturaIndex){
        $this->indiceEdicionFactura = $facturaIndex;
    }

    public function saveFactura($facturaIndex){
        $factura = $this->facturas[$facturaIndex] ?? NULL;
        if(!is_null($factura)) {
            $editedFactura = Factura::find($factura['id']);
            if ($editedFactura){
                $editedFactura->update($factura);
            }
        }
        $this->indiceEdicionFactura = null;
        $this->entrega->refresh();
    }
}

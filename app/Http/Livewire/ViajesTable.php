<?php

namespace App\Http\Livewire;

use App\Viaje;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class ViajesTable extends LivewireDatatable
{
    public $tab;

    public $model = Viaje::class;

    public function builder()
    {

        if ($this->tab == 'todo') {
            return \App\Models\Viaje::query();
        }else {
            $tipo_estado = $this->tab;

            return \App\Models\Viaje::query()
                ->where(function ($query) use ($tipo_estado) {
                    $query->where('estado', '=', $tipo_estado);
                });
        }
    }


    public function columns()
    {
        return [

            Column::checkbox(),

            NumberColumn::name('id')
                ->label('ID')
                ->filterable()

        ];
    }
}

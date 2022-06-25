    <div >
        <button wire:click="muestraEscondidos()"> {{ $ismuestraEscondidos ? 'Ocultar' : 'Mostrar Todos' }} </button>


        <table class="table table-hover table-striped table-fixed-header">
            <thead class="header">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Ocultar</th>
                    <th scope="col">Destino</th>
                    <th scope="col">Operador</th>
                    <th scope="col">Unidad</th>
                    <th scope="col">Inicio Viaje</th>
                    <th scope="col">Asignadas</th>
                    <th scope="col">Pendientes</th>
                    <th scope="col">Completadas</th>
                    @can('viaje_edit')
                        <th scope="col">Acción</th>
                    @endcan
                </tr>
            </thead>
            <tbody wire:poll="pinta">
                @foreach ($viajes as $viaje)
                    @php
                        
                        $entregas_activas = $viaje->entregas->whereNull('fecha_entrega');
                        $num_entregas_activas = $entregas_activas->count();
                        $num_total_entregas = $viaje->entregas->count();
                        
                    @endphp
                    <tr style="cursor: pointer;" wire:key={{ $loop->index }}>
                        <th scope="row">{{ $viaje->id }}</th>
                        <td> <input type="checkbox" wire:click="oculta_viaje({{ $viaje->id }})"
                                @if ($viaje->esconder==1) checked="checked" @endif /> </td>
                        <td onclick="window.location='{{ route('admin.viajes.show', [$viaje]) }}'"
                            class="d-flex justify-content-center">{{ $viaje->destino ?? '' }}</td>
                        <td>{{ $viaje->operador->nombre ?? '' }} </td>
                        <td>{{ $viaje->unidad->codigo ?? '' }}</td>
                        <td>{{ $viaje->fecha_inicio ?? '' }}</td>

                        <td class="{{ $num_entregas_activas == 0 && $num_total_entregas > 0 ? 'bg-success' : '' }}">
                            {{ $num_total_entregas }}</td>
                        <td
                            class="{{ $num_entregas_activas == 0 && $num_total_entregas > 0 ? 'bg-success' : 'bg-warning' }}">
                            {{ $num_entregas_activas }}</td>
                        <td
                            class="{{ $num_entregas_activas == 0 && $num_total_entregas > 0 ? 'bg-success' : 'bg-success' }}">
                            {{ $num_total_entregas - $num_entregas_activas }}</td>
                        @can('viaje_edit')
                            <td class="d-flex justify-content-center">
                                <a class="btn btn-xs btn-info" href="{{ route('admin.viajes.edit', $viaje->id) }}">
                                    {{ trans('global.edit') }}
                                </a>
                            </td>
                        @endcan
                    </tr>
                @endforeach


            </tbody>
        </table>
    </div>

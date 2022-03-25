@extends('layouts.admin')
@section('content')


    <table class="table table-hover table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">First</th>
            <th scope="col">Last</th>
            <th scope="col">Handle</th>
            <th scope="col">First</th>
            <th scope="col">Last</th>
            <th scope="col">Handle</th>
            @can('viaje_edit')
                <th scope="col">Acción</th>
            @endcan
        </tr>
        </thead>
        <tbody>
        @foreach($viajes as $viaje)
            @php


                $entregas_activas = $viaje->entregas->whereNull('fecha_entrega');
                $num_entregas_activas = $entregas_activas->count();
                $num_total_entregas = $viaje->entregas->count();

            @endphp
            <tr onclick="window.location='{{ route('admin.viajes.show', [$viaje] ) }}'" style="cursor: pointer;">
                <th scope="row">{{ $viaje->id }}</th>
                <td>{{  $viaje->nombre_viaje }}</td>
                <td>{{  $viaje->operador->nombre }}</td>
                <td>{{  $viaje->unidad->codigo }}</td>
                <td class="bg-danger ">{{  $num_total_entregas }}</td>
                <td class="bg-success">{{  $num_entregas_activas }}</td>
                <td class="bg-warning">{{  $num_total_entregas - $num_entregas_activas }}</td>
                @can('viaje_edit')
                    <td>
                        <a class="btn btn-xs btn-info" href="{{ route('admin.viajes.edit', $viaje->id) }}">
                            {{ trans('global.edit') }}
                        </a>
                    </td>
                @endcan
            </tr>
        @endforeach


        </tbody>
    </table>
@endsection


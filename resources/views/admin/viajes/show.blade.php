@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.viaje.title') }}
    </div>
    @php


    $entregas_activas = $viaje->entregas->whereNull('fecha_entrega');
    $num_entregas_activas = $entregas_activas->count();
    $num_total_entregas = $viaje->entregas->count();

    @endphp
    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ URL::previous() }}">
                    Regresar
                </a>
            </div>

            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Viaje</th>
                    <th scope="col">Cliente</th>
                    <th scope="col">Fecha llegada</th>
                    <th scope="col">Fecha Entrega</th>
                </tr>
                </thead>
                <tbody>
                @foreach($viaje->entregas as $entrega)
                    <tr>
                        <th scope="row">{{ $entrega->id }}</th>
                        <td>{{ $viaje->nombre_viaje }}</td>
                        <td>{{ $entrega->cliente->razon_social }}</td>
                        <td>{{ $entrega->fecha_llegada }}</td>
                        <td>{{ $entrega->fecha_entrega }}</td>
                    </tr>
                @endforeach

                </tbody>
            </table>






            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.viajes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection

@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.viaje.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.viajes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.viaje.fields.id') }}
                        </th>
                        <td>
                            {{ $viaje->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.viaje.fields.nombre_viaje') }}
                        </th>
                        <td>
                            {{ $viaje->nombre_viaje }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.viaje.fields.cliente') }}
                        </th>
                        <td>
                            {{ $viaje->cliente->razon_social ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.viaje.fields.unidad') }}
                        </th>
                        <td>
                            {{ $viaje->unidad->codigo ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.viaje.fields.operador') }}
                        </th>
                        <td>
                            {{ $viaje->operador->nombre ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.viaje.fields.estado') }}
                        </th>
                        <td>
                            {{ App\Models\Viaje::ESTADO_SELECT[$viaje->estado] ?? '' }}
                        </td>
                    </tr>
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
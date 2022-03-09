@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.entrega.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.entregas.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.entrega.fields.id') }}
                        </th>
                        <td>
                            {{ $entrega->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.entrega.fields.viaje') }}
                        </th>
                        <td>
                            {{ $entrega->viaje->nombre_viaje ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.entrega.fields.cliente') }}
                        </th>
                        <td>
                            {{ $entrega->cliente->razon_social ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.entrega.fields.fecha_llegada') }}
                        </th>
                        <td>
                            {{ $entrega->fecha_llegada }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.entrega.fields.fecha_entrega') }}
                        </th>
                        <td>
                            {{ $entrega->fecha_entrega }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.entregas.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
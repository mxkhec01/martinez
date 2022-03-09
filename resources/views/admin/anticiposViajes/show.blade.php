@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.anticiposViaje.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.anticipos-viajes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.anticiposViaje.fields.id') }}
                        </th>
                        <td>
                            {{ $anticiposViaje->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.anticiposViaje.fields.viaje') }}
                        </th>
                        <td>
                            {{ $anticiposViaje->viaje->estado ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.anticiposViaje.fields.monto') }}
                        </th>
                        <td>
                            {{ $anticiposViaje->monto }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.anticiposViaje.fields.descripcion') }}
                        </th>
                        <td>
                            {{ $anticiposViaje->descripcion }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.anticiposViaje.fields.fecha') }}
                        </th>
                        <td>
                            {{ $anticiposViaje->fecha }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.anticipos-viajes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection